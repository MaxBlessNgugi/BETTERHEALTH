<?php
require_once(__DIR__ . '/../includes/db_fns.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['valid_user']) && isset($_POST['src_id'])) {
    $username = trim(mysqli_real_escape_string($db, filter_var($_SESSION['valid_user'], FILTER_SANITIZE_EMAIL)));
    $SRC_ID = intval($_POST['src_id']);
bh_enforce_panel('r/new-bridge.php', $SRC_ID);

    $resultHospital = mysqli_query($db, "SELECT `CompanyName`,`Tel`,`Address`,`Website`,`Email`,`Logo` FROM `company` LIMIT 0,1 ");
    $rowHospital = mysqli_fetch_assoc($resultHospital);
    $hospitalName = trim(str_ireplace('_', ' ', strtoupper(stripslashes($rowHospital['CompanyName']))));
    $hospitalTel = stripslashes($rowHospital['Tel']);
    $hospitalAddress = stripslashes($rowHospital['Address']);
    $hospitalLogo = '../' . trim(stripslashes($rowHospital['Logo']));
    #$rootdirpath = 'http://' . $server . '/Better-Health';
    $rootdirpath = 'http://' . $server . '/Better-Health-LCMH';
    $hospitalLogo_path = $rootdirpath . '/' . $hospitalLogo;
    $hospitalLogo1 = 'data:image/' . mime_content_type($hospitalLogo) . ';base64,' . base64_encode(@file_get_contents($hospitalLogo_path));
} else {
    header('location: ../index.php');
    exit;
}

switch ($SRC_ID) {
    case 1:
        $output = '';
        $today = date('Y/m/d');
        $today_obj = date_create($today);
        date_sub($today_obj, date_interval_create_from_date_string('1 month'));
        $one_year_ago = date_format($today_obj, "Y/m/d");

        $output .= '<div id="recon_container" class="recon-container">';
        #$output .= '<div id="recon_container" style="width:1000px;background-color:#fff;height:500px;overflow-y:scroll;margin-bottom:100px;">';
        $output .= '<div style="background-color:#ededed;width:100%;padding:10px;">
                        <h4 style="text-align:left;color:#000;display:none;">BANK RECONCILIATION <h4>
                        <div style="display:flex;justify-content:space-between;">
                            <div style="padding:8px;">
                              <label>START DATE</label>
                              <label for="recon_startdate" class="bh-visually-hidden">START DATE</label><input id="recon_startdate" type="text" value="' . $one_year_ago . '" class="chs" style="width:220px;" readonly>
                            </div> 
                            <div style="padding:8px;">
                              <label>END DATE</label>
                              <label for="recon_enddate" class="bh-visually-hidden">END DATE</label><input id="recon_enddate" type="text" value="' . $today . '" class="chs" style="width:220px;" readonly>
                            </div> 

                            <div style="padding:8px;"> 
                                <label>FILTER</label>
                                <label for="recon_searchdispfilter" class="bh-visually-hidden">FILTER</label><select id="recon_searchdispfilter" class="chs-select">
                                    <option value="Unconfirmed" >Unconfirmed Only</option>
                                    <option value="All" >All</option>
                                </select>
                            </div>

                            <div style="padding:8px;"> 
                                <label>BANK</label>
                                <label for="recon_searchbank" class="bh-visually-hidden">BANK</label><select id="recon_searchbank" class="chs-select">';
        $result1stBank = mysqli_query($db, "SELECT `ledgerid`,`name` FROM `ledgers` WHERE ledgerid!=818 AND `category`='Bank' ORDER BY `ledgerid` DESC ");
        if (mysqli_num_rows($result1stBank) > 0) {
            $row1stBank = mysqli_fetch_assoc($result1stBank);
            $recon_searchbankname = strtoupper(trim(stripslashes($row1stBank['name'])));
        } else {
            $recon_searchbankname = '';
        }

        $result1 = mysqli_query($db, "SELECT `ledgerid`,`name` FROM `ledgers` WHERE ledgerid!=818 AND `category`='Bank' ORDER BY `ledgerid` DESC ");
        while ($row = mysqli_fetch_assoc($result1)) {
            $output .= '<option value="' . intval($row['ledgerid']) . '">' . ucwords(strtolower(trim(stripslashes($row['name'])))) . '</option>';
        }
        $output .=
            '</select>
                            </div>
                            <div style="padding:16px 16px 8px 0;">
                                <image src="./images/zoom.png" title="Search by selected dates and bank" style="width:32px;height:32px;cursor:pointer;" onclick="bankReconSearch()"/>
                            </div>
                        </div>

                    </div>';
        $output .= '<div style="background-color:#fff;">';
        $output .= '<table id="bank_recontbl" class="bhealth-table"> 
                  <thead>
                    <tr style="background-color:#444;color:#fff;">
                        <th scope="col" style="width:4%;">No. </th>
                        <th scope="col" style="width:8%;">DATE </th>
                        <th scope="col" style="width:25%;">NARRATION </th>
                        <th scope="col" style="width:12%;">REF NO </th>
                        <th scope="col" style="width:10%;">OPENING BAL </th>
                        <th scope="col" style="width:10%;">WITHDRAW </th>
                        <th scope="col" style="width:10%;">DEPOSIT </th>
                        <th scope="col" style="width:12%;">BALANCE </th>
                        <th scope="col" style="width:5%;text-align:center;"></th>
                        <th scope="col" style="width:10%;">RECON_NOTE</th>
                  </tr>
                </thead>
                <tbody>';
        $total_withdraws = 0;
        $total_deposits = 0;
        $OpeningBal = 0;
        $count = 0;
        $total_transactions = 0;
        $total_confirmed = 0;
        $total_unconfirmed = 0;
        $resultBN = mysqli_query($db, "SELECT `ledgerid` FROM `ledgers` WHERE ledgerid!=818 AND `category`='Bank' ORDER BY `ledgerid` DESC LIMIT 0,1 ");
        if (mysqli_num_rows($resultBN) > 0) {
            $rowBN = mysqli_fetch_assoc($resultBN);
            $bankledgerid = intval($rowBN['ledgerid']);

            $result = mysqli_query($db, "SELECT `transid`,`crid`,`crname`,`drid`,`drname`,`amount`,`description`,`date`,`crbal`,`drbal`,`openingCrBal`,`openingDrBal`,`transType`,`transRefno`,`payMode` FROM `ledgerentries` WHERE `date`>='" . $one_year_ago . "' AND `date`<='" . $today . "' AND (`crid`='" . $bankledgerid . "' OR `drid`='" . $bankledgerid . "' ) AND `transid` NOT IN(SELECT DISTINCT `ledgerentriesID` FROM `bank_recon` WHERE `isConfirmed`=1 AND `bankLedgerID`='" . $bankledgerid . "' ) ORDER BY `date` DESC ");
            while ($row = mysqli_fetch_assoc($result)) {
                $resultRN = mysqli_query($db, "SELECT `reconNote` FROM `bank_recon` WHERE `ledgerentriesID`='" . intval($row['transid']) . "' LIMIT 0,1 ");
                if (mysqli_num_rows($resultRN) > 0) {
                    $rowRN = mysqli_fetch_assoc($resultRN);
                    $reconNote = trim(stripslashes($rowRN['reconNote']));
                } else {
                    $reconNote = '';
                }
                $count += 1;
                $crbal = floatval(str_replace(',', '', trim(stripslashes($row['crbal']))));
                $drbal = floatval(str_replace(',', '', trim(stripslashes($row['drbal']))));
                $openingCrBal = floatval(str_replace(',', '', trim(stripslashes($row['openingCrBal']))));
                $openingDrBal = floatval(str_replace(',', '', trim(stripslashes($row['openingDrBal']))));
                $amount = floatval(str_replace(',', '', trim(stripslashes($row['amount']))));
                $total_transactions += floatval($amount);
                $output .= '<tr>
                                <td>' . $count . '. </td>
                                <td>' . trim(stripslashes($row['date'])) . ' </td>
                                <td>' . ucwords(strtolower(trim(stripslashes($row['description'])))) . ' </td>
                                <td>' . trim(stripslashes($row['transRefno'])) . ' </td>';
                if (intval($row['crid']) == $bankledgerid) {
                    $total_withdraws += floatval($amount);
                    $output .= '<td>' . number_format($openingCrBal, 2, '.', ',') . ' </td>';
                    $output .= '<td>' . number_format($amount, 2, '.', ',') . ' </td>';
                    $output .= '<td>0.00 </td>';
                    $output .= '<td data-entry="credit">' . number_format($crbal, 2, '.', ',') . ' </td>';
                } else if (intval($row['drid']) == $bankledgerid) {
                    $total_deposits += floatval($amount);
                    $output .= '<td>' . number_format($openingDrBal, 2, '.', ',') . ' </td>';
                    $output .= '<td>0.00 </td>';
                    $output .= '<td>' . number_format($amount, 2, '.', ',') . ' </td>';
                    $output .= '<td data-entry="debit">' . number_format($drbal, 2, '.', ',') . ' </td>';
                } else {
                    $output .= '<td>0.00 </td>';
                    $output .= '<td>0.00 </td>';
                    $output .= '<td>0.00 </td>';
                    $output .= '<td>0.00 </td>';
                }
                $output .= '<td style="text-align:center;"> 
                                    <label for="bank_reconcb' . intval($row['transid']) . '" class="bh-visually-hidden">Bank Reconcb</label><input id="bank_reconcb' . intval($row['transid']) . '" type="checkbox" name="bank_reconcb" value="' . intval($row['transid']) . '" data-amt="' . $amount . '" data-inc="0" class="bank_reconcb" >
                                </td>';
                $output .= '<td style="text-align:center;"> 
                                    <label for="reconcnote' . intval($row['transid']) . '" class="bh-visually-hidden">Reconcnote</label><input id="reconcnote' . intval($row['transid']) . '" type="text" name="reconcnote" value="' . $reconNote . '" data-transid="' . intval($row['transid']) . '" data-bankid="' . $bankledgerid . '" class="input_field" style="width:80px;">
                                </td>';

                $output .= '</tr>';
            }

            $resultOB = mysqli_query($db, "SELECT `crid`,`drid`,`amount`,`openingCrBal`,`openingDrBal` FROM `ledgerentries` WHERE `date`>='" . $one_year_ago . "' AND `date`<='" . $today . "' AND (`crid`='" . $bankledgerid . "' || `drid`='" . $bankledgerid . "' ) AND `transid` NOT IN(SELECT DISTINCT `ledgerentriesID` FROM `bank_recon` WHERE `isConfirmed`=1 AND `bankLedgerID`='" . $bankledgerid . "' ) ORDER BY `date` DESC LIMIT 0,1 ");
            if (mysqli_num_rows($resultOB) > 0) {
                $row = mysqli_fetch_assoc($resultOB);
                if (intval($row['crid']) == $bankledgerid) {
                    $OpeningBal = floatval(preg_replace('~,~', '', trim(stripslashes($row['openingCrBal']))));
                } else if (intval($row['drid']) == $bankledgerid) {
                    $OpeningBal = floatval(preg_replace('~,~', '', trim(stripslashes($row['openingDrBal']))));
                }
            }
            $transBal = (floatval($OpeningBal) + floatval($total_deposits)) - floatval($total_withdraws);
            $output .= '<tr><th scope="row" colspan="6" style="text-align:right;">PERIOD CLOSING BALANCE </th> <th scope="row" colspan="2" style="font-size:14px;font-weight:bold;text-align:right;">' . number_format($transBal, 2, '.', ',') . ' </th>  <thscope="row"> </th> <th scope="row" colspan="2"> </th> </tr>';
        } else {
            $output .= '<tr><td colspan="10" style="text-align:center;">No transactions found.</td></tr>';
        }

        $output .= '</tbody>
      

      </table>';
        $output .= '</div>';

        $output .= '<div style="width:100%;margin:10px 10px 10px 0;">
                    <button id="reconcileBankBtn" type="button" class="btn btn-black btn-sm" disabled>Bank Reconciliation</button>';
        $output .= '<div style="float:right;padding-right:20px;">
                            <a class="labels" style="margin-right:5px;" >Bank Balance: </a>
                            <input id="recon_userbankbal_inpt" type="text" class="input_field" style="width:140px;" placeholder="Enter bank balance" >
                            <input id="recon_localbankopeningbal" type="hidden" value="' . $OpeningBal . '" style="display:none;" placeholder="Bank opening balance" >
                            <input id="recon_totalbankdeposits" type="hidden" value="' . $total_deposits . '" style="display:none;" placeholder="Bank Deposits" >
                            <input id="recon_totalbankwithdraws" type="hidden" value="' . $total_withdraws . '" style="display:none;" placeholder="Bank Withdraws" >
                            <input id="recon_searchbankname" type="hidden" value="' . $recon_searchbankname . '" style="display:none;" >
                        </div>';


        $output .= '</div>';

        $output .= '<div id="print_recon_rpt" style="width:100%;">';
        $output .= '<div style="width:100%;">';

        $output .= '<div style="clear:both; margin-bottom:10px"></div>
                            <img alt="HospitalLogo1" src="' . $hospitalLogo1 . '" style="max-height:90px; margin:0px 10px 20px 10px; position:absolute;" />
                            <p style="text-align:center;font-size:11px; font-weight:bold;font-family:\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif;margin:0 0 0 0px">' . $hospitalName . '</p>
                            <div style="clear:both"></div>
                            <p style="text-align:center;font-size:11px; font-weight:bold;font-family:\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif;margin:0 0 0 0px">P.O BOX ' . $hospitalAddress . ' <br /> TEL: ' . $hospitalTel . '</p>
                            <div style="clear:both;margin-bottom:10px"></div>
                            <p id="recontitle_paragraph" style="text-align:center;font-size:11px; font-weight:bold;font-family:\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif;margin:0 0 0 0px">' . strtoupper($recon_searchbankname) . ' RECONCILITION FOR PERIOD <strong style="font-size:11px">START DATE:' . $one_year_ago . '  END DATE:' . $today . ' </strong></p>
                            <div style="clear:both"></div>
                            <div style="clear:both; margin-bottom:20px"></div>';

        $output .= '</div>';
        $output .= '<div id="confirmed_recondiv" style="width:100%;margin:10px 10px 10px 0;display:none;">';
        $output .= '<table id="confirmedrecontbl" class="bhealth-table"> 
                            <thead>
                                <tr style="color:#000;background-color:rgba(109, 240, 146, 0.93);">
                                    <th scope="col" colspan="5" style="font-size:12px;">CONFIRMED TRANSACTIONS </th>
                                    <thscope="col">WITHDRAW</th>
                                    <thscope="col">DEPOSIT</th>
                                    <thscope="col">BALANCE</th>
                                    <thscope="col">RECON_NOTE</th>

                                </tr>
                            </thead>
                            <tbody>';
        $output .= '<tr><td colspan="10" style="text-align:center;">No transactions found.</td></tr>';
        $output .= '</tbody> 
                                <tfoot>
                                    <tr style="font-size:12px;">
                                        <th scope="col" colspan="5">TOTAL </th>
                                        <th scope="col" id="confirmedrecontblwithdrawtotal">0.00 </th>
                                        <th scope="col" id="confirmedrecontbldepositbaltotal">0.00 </th>
                                        <th scope="col" id="confirmedrecontblbaltotal"> </th>
                                        <thscope="col"> </th>
                                    </tr>
                                </tfoot>
                        </table>';

        $output .= '</div>';

        $output .= '<div id="unconfirmed_recondiv" style="width:100%;margin:10px 10px 10px 0;display:none;">';
        $output .= '<table id="unconfirmedrecontbl" class="bhealth-table"> 
                            <thead>
                                <tr style="font-size:12px;color:#fff;background-color:rgba(247, 105, 105, 0.93);">
                                    <th scope="col" colspan="5">UNCONFIRMED TRANSACTIONS </th>
                                    <thscope="col">WITHDRAW</th>
                                    <thscope="col">DEPOSIT</th>
                                    <thscope="col">BALANCE</th>
                                    <thscope="col">RECON_NOTE</th>
                                </tr>
                            </thead>
                            <tbody>';
        $output .= '<tr>
                                        <td colspan="10" style="text-align:center;">No data found.</td>
                                    </tr>';
        $output .= '</tbody> 
                                <tfoot>
                                    <tr style="font-size:12px;">
                                        <th scope="col" colspan="5">TOTAL </th>
                                        <th scope="col" id="unconfirmedrecontblwithdrawtotal">0.00 </th>
                                        <th scope="col" id="unconfirmedrecontbldepositbaltotal">0.00 </th>
                                        <th scope="col" id="unconfirmedrecontblbaltotal"> </th>
                                        <thscope="col"> </th>
                                    </tr>
                                </tfoot>
                        </table>';

        $output .= '</div>';

        $output .= '<div id="summary_recondiv" style="width:100%;margin:10px 10px 10px 0;padding-bottom:60px;display:none;">';
        $output .= '<table id="reconsummarytbl" class="bhealth-table" style="width:500px;background-color:#ededed;"> 
                            <thead>
                                <tr style="font-size:14px;color:#000;">
                                    <th scope="col" style="border-top:none;border-left:none;padding:8px;">SUMMARY </th>
                                    <th scope="col" style="border-top:none;border-left:none;padding:8px;display:;">DEPOSIT </th>
                                    <th scope="col" style="border-top:none;border-left:none;padding:8px;display:;">WITHDRAW </th>
                                    <th scope="col" style="border-top:none;border-left:none;padding:8px;display:;">BALANCE </th>

                                </tr>
                            </thead>
                            <tbody>';
        $output .= '<tr style="font-size:12px;">
                                        <th scope="row" style="width:40%;color:#000;border-top:none;border-left:none;padding:8px;">CONFIRMED </th>
                                        <th scope="row" style="width:20%;color:#000;border-top:none;border-left:none;padding:8px;display:;" id="rconsumryconfirmeddeposittotal"> </th>
                                        <th scope="row" style="width:20%;color:#000;border-top:none;border-left:none;padding:8px;display:;" id="rconsumryconfirmedwithdrwtotal"> </th>
                                        <th scope="row" style="width:20%;color:#000;border-top:none;border-left:none;padding:8px;display:;" id="reconsummarytblconfirmedtotal"> </th>
                                    </tr>';
        $output .= '<tr style="font-size:12px;">
                                        <th scope="row" style="width:40%;color:#000;border-top:none;border-left:none;padding:8px;">UNCONFIRMED </th>
                                        <th scope="row" style="width:20%;color:#000;border-top:none;border-left:none;padding:8px;display:;" id="rconsumryunconfirmeddeposittotal"> </th>
                                        <th scope="row" style="width:20%;color:#000;border-top:none;border-left:none;padding:8px;display:;" id="rconsumryunconfirmedwithdrwtotal"> </th>
                                        <th scope="row" style="width:20%;color:#000;border-top:none;border-left:none;padding:8px;display:;" id="reconsummarytblunconfirmedtotal"> </th>
                                    </tr>';
        $output .= '<tr style="font-size:12px;display:none;">
                                        <th scope="row" style="width:40%;color:#000;border-top:none;border-left:none;padding:8px;">BANK BALANCE </th>
                                        <th scope="row" style="width:20%;color:#000;border-top:none;border-left:none;padding:8px;display:;" id="rconsumrybankbaldeposittotal"> </th>
                                        <th scope="row" style="width:20%;color:#000;border-top:none;border-left:none;padding:8px;display:;" id="rconsumrybankbalwithdrwtotal"> </th>
                                        <th scope="row" style="width:20%;color:#000;border-top:none;border-left:none;padding:8px;display:;" id="reconsumrytblbankbaltotal"> </th>
                                    </tr>';

        $output .= '<tr style="font-size:12px;display:none;">
                                        <th scope="row" style="width:40%;color:#000;border-top:none;border-left:none;padding:8px;">DIFFERENCE </th>
                                        <th scope="row" style="width:20%;color:#000;border-top:none;border-left:none;padding:8px;display:;" id="rconbankbal_unconfirmeddeposittotal_diff"> </th>
                                        <th scope="row" style="width:20%;color:#000;border-top:none;border-left:none;padding:8px;display:;" id="rconbankbal_unconfirmedwithdrwtotal_diff"> </th>
                                        <th scope="row" style="width:20%;color:#000;border-top:none;border-left:none;padding:8px;display:;" id="reconbankbalunconfirmedtotal_diff"> </th>
                                    </tr>';


        $output .= '</tbody> 
                        </table>';
        $output .= '<div style="width:300px;padding:10px;">
                                    <p>BANK BALANCE  <span id="bank_balh4"></span> </p>
                                    <p>UNCONFIRMED BALANCE <span id="unconfirmed_balh4"></span> </p>
                                    <p>DIFFERENCE <span id="bankbal_unconfirmedbal_diffh4"></span></p>
                            </div>';
        $output .= '</div>';


        $output .= '</div>';

        $output .= '<div style="width:90%;margin:20px;text-align:right;padding:10px;">
                        <form id="printreconrprt_form" action="./illness-management-form.php" method="post" target="_blank">
                            <label for="bankreconrprt_html" class="bh-visually-hidden">Bankreconrprt Html</label><input id="bankreconrprt_html" type="text" name="bankreconrprt_html" style="display:none;">
                            <button id="printreconreport_btn" type="button" class="btn btn-dark btn-sms" style="padding:6px 12px;cursor:pointer;" disabled>PRINT</button>
                        </form>
                    </div>';


        $output .= '</div>';



        die($output);

        break;

    case 2:
        $output = '';
        $OpeningBal = 0;
        if (isset($_POST['recon_startdate']) && isset($_POST['recon_enddate']) && isset($_POST['recon_searchbank'])) {
            $reconsearchbankledgerid = intval($_POST['recon_searchbank']);
            $recon_startdate = trim(mysqli_real_escape_string($db, $_POST['recon_startdate']));
            $recon_enddate = trim(mysqli_real_escape_string($db, $_POST['recon_enddate']));
            $recon_searchdispfilter = trim(mysqli_real_escape_string($db, $_POST['recon_searchdispfilter']));

            if ($reconsearchbankledgerid > 0) {
                $result1stBank = mysqli_query($db, "SELECT `name` FROM `ledgers` WHERE ledgerid='" . $reconsearchbankledgerid . "' LIMIT 0,1 ");
                if (mysqli_num_rows($result1stBank) > 0) {
                    $row1stBank = mysqli_fetch_assoc($result1stBank);
                    $recon_searchbankname = strtoupper(trim(stripslashes($row1stBank['name'])));
                } else {
                    $recon_searchbankname = '';
                }

                $count = 0;
                $total_withdraws = 0;
                $total_deposits = 0;
                if ($recon_searchdispfilter == 'All') {
                    $result = mysqli_query($db, "SELECT `transid`,`crid`,`crname`,`drid`,`drname`,`amount`,`description`,`date`,`crbal`,`drbal`,`openingCrBal`,`openingDrBal`,`transType`,`transRefno`,`payMode` FROM `ledgerentries` WHERE `date`>='" . $recon_startdate . "' AND `date`<='" . $recon_enddate . "' AND (`crid`='" . $reconsearchbankledgerid . "' OR `drid`='" . $reconsearchbankledgerid . "' ) ORDER BY `date` DESC ");
                } else {
                    $result = mysqli_query($db, "SELECT `transid`,`crid`,`crname`,`drid`,`drname`,`amount`,`description`,`date`,`crbal`,`drbal`,`openingCrBal`,`openingDrBal`,`transType`,`transRefno`,`payMode` FROM `ledgerentries` WHERE `date`>='" . $recon_startdate . "' AND `date`<='" . $recon_enddate . "' AND (`crid`='" . $reconsearchbankledgerid . "' OR `drid`='" . $reconsearchbankledgerid . "' ) AND `transid` NOT IN(SELECT DISTINCT `ledgerentriesID` FROM `bank_recon` WHERE `isConfirmed`=1 AND `bankLedgerID`='" . $reconsearchbankledgerid . "' ) ORDER BY `date` DESC ");
                }

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $resultRN = mysqli_query($db, "SELECT `reconNote` FROM `bank_recon` WHERE `ledgerentriesID`='" . intval($row['transid']) . "' LIMIT 0,1 ");
                        if (mysqli_num_rows($resultRN) > 0) {
                            $rowRN = mysqli_fetch_assoc($resultRN);
                            $reconNote = trim(stripslashes($rowRN['reconNote']));
                        } else {
                            $reconNote = '';
                        }
                        $count += 1;
                        $crbal = floatval(str_replace(',', '', trim(stripslashes($row['crbal']))));
                        $drbal = floatval(str_replace(',', '', trim(stripslashes($row['drbal']))));
                        $openingCrBal = floatval(str_replace(',', '', trim(stripslashes($row['openingCrBal']))));
                        $openingDrBal = floatval(str_replace(',', '', trim(stripslashes($row['openingDrBal']))));
                        $amount = floatval(str_replace(',', '', trim(stripslashes($row['amount']))));
                        //$total_transactions += floatval($amount);
                        $output .= '<tr>
                            <td>' . $count . '. </td>
                            <td>' . trim(stripslashes($row['date'])) . ' </td>
                            <td>' . ucwords(strtolower(trim(stripslashes($row['description'])))) . ' </td>
                            <td>' . trim(stripslashes($row['transRefno'])) . ' </td>';
                        if (intval($row['crid']) == $reconsearchbankledgerid) {
                            $total_withdraws += floatval($amount);
                            $output .= '<td>' . number_format($openingCrBal, 2, '.', ',') . ' </td>';
                            $output .= '<td>' . number_format($amount, 2, '.', ',') . ' </td>';
                            $output .= '<td>0.00 </td>';
                            $output .= '<td data-entry="credit">' . number_format($crbal, 2, '.', ',') . ' </td>';
                        } else if (intval($row['drid']) == $reconsearchbankledgerid) {
                            $total_deposits += floatval($amount);
                            $output .= '<td>' . number_format($openingDrBal, 2, '.', ',') . ' </td>';
                            $output .= '<td>0.00 </td>';
                            $output .= '<td>' . number_format($amount, 2, '.', ',') . ' </td>';
                            $output .= '<td data-entry="debit">' . number_format($drbal, 2, '.', ',') . ' </td>';
                        } else {
                            $output .= '<td>0.00 </td>';
                            $output .= '<td>0.00 </td>';
                            $output .= '<td>0.00 </td>';
                            $output .= '<td>0.00 </td>';
                        }
                        $output .= '<td style="text-align:center;"> 
                                <label for="bank_reconcb' . intval($row['transid']) . '" class="bh-visually-hidden">Bank Reconcb</label><input id="bank_reconcb' . intval($row['transid']) . '" type="checkbox" name="bank_reconcb" value="' . intval($row['transid']) . '" data-amt="' . $amount . '" data-inc="0" class="bank_reconcb" >
                            </td>';
                        $output .= '<td style="text-align:center;"> 
                                    <label for="reconcnote' . intval($row['transid']) . '" class="bh-visually-hidden">Reconcnote</label><input id="reconcnote' . intval($row['transid']) . '" type="text" name="reconcnote" value="' . $reconNote . '" data-transid="' . intval($row['transid']) . '" data-bankid="' . $reconsearchbankledgerid . '" class="input_field" style="width:80px;">
                                </td>';
                        $output .= '</tr>';
                    }

                    if ($recon_searchdispfilter == 'All') {
                        $resultOB = mysqli_query($db, "SELECT `crid`,`drid`,`amount`,`openingCrBal`,`openingDrBal` FROM `ledgerentries` WHERE `date`>='" . $recon_startdate . "' AND `date`<='" . $recon_enddate . "' AND (`crid`='" . $reconsearchbankledgerid . "' || `drid`='" . $reconsearchbankledgerid . "' ) ORDER BY `date` DESC LIMIT 0,1 ");
                    } else {
                        $resultOB = mysqli_query($db, "SELECT `crid`,`drid`,`amount`,`openingCrBal`,`openingDrBal` FROM `ledgerentries` WHERE `date`>='" . $recon_startdate . "' AND `date`<='" . $recon_enddate . "' AND (`crid`='" . $reconsearchbankledgerid . "' || `drid`='" . $reconsearchbankledgerid . "' ) AND `transid` NOT IN(SELECT DISTINCT `ledgerentriesID` FROM `bank_recon` WHERE `isConfirmed`=1 AND `bankLedgerID`='" . $reconsearchbankledgerid . "' ) ORDER BY `date` DESC LIMIT 0,1 ");
                    }

                    if (mysqli_num_rows($resultOB) > 0) {
                        $row = mysqli_fetch_assoc($resultOB);
                        if (intval($row['crid']) == $reconsearchbankledgerid) {
                            $OpeningBal = floatval(preg_replace('~,~', '', trim(stripslashes($row['openingCrBal']))));
                        } else if (intval($row['drid']) == $reconsearchbankledgerid) {
                            $OpeningBal = floatval(preg_replace('~,~', '', trim(stripslashes($row['openingDrBal']))));
                        }
                    }
                    $transBal = (floatval($OpeningBal) + floatval($total_deposits)) - floatval($total_withdraws);
                    $output .= '<tr><th scope="col" colspan="6" style="text-align:right;">PERIOD CLOSING BALANCE </th> <th scope="col" colspan="2" style="font-size:14px;font-weight:bold;text-align:right;">' . number_format($transBal, 2, '.', ',') . ' </th>  <th scope="col" colspan="2"> </th> </tr>';
                } else {
                    $output .= '<tr> <td colspan="10" style="text-align:center;">No transactions found for selected period and bank. </td> </tr>';
                }


                if ($recon_searchdispfilter == 'All') {
                    $resultOB = mysqli_query($db, "SELECT `crid`,`drid`,`amount`,`openingCrBal`,`openingDrBal` FROM `ledgerentries` WHERE `date`>='" . $recon_startdate . "' AND `date`<='" . $recon_enddate . "' AND (`crid`='" . $reconsearchbankledgerid . "' || `drid`='" . $reconsearchbankledgerid . "' ) ORDER BY `date` DESC LIMIT 0,1 ");
                } else {
                    $resultOB = mysqli_query($db, "SELECT `crid`,`drid`,`amount`,`openingCrBal`,`openingDrBal` FROM `ledgerentries` WHERE `date`>='" . $recon_startdate . "' AND `date`<='" . $recon_enddate . "' AND (`crid`='" . $reconsearchbankledgerid . "' || `drid`='" . $reconsearchbankledgerid . "' ) AND `transid` NOT IN(SELECT DISTINCT `ledgerentriesID` FROM `bank_recon` WHERE `isConfirmed`=1 AND `bankLedgerID`='" . $reconsearchbankledgerid . "' ) ORDER BY `date` DESC LIMIT 0,1 ");
                }

                if (mysqli_num_rows($resultOB) > 0) {
                    $row = mysqli_fetch_assoc($resultOB);
                    if (intval($row['crid']) == $reconsearchbankledgerid) {
                        $OpeningBal = floatval(preg_replace('~,~', '', trim(stripslashes($row['openingCrBal']))));
                    } else if (intval($row['drid']) == $reconsearchbankledgerid) {
                        $OpeningBal = floatval(preg_replace('~,~', '', trim(stripslashes($row['openingDrBal']))));
                    }
                }
            } else {
                $output .= '<tr> <td colspan="10" style="text-align:center;">Selected bank not found. </td> </tr>';
                $recon_searchbankname = '';
            }
        } else {
            $output .= '<tr> <td colspan="10" style="text-align:center;">Please select a date range and bank. </td> </tr>';
            $recon_searchbankname = '';
        }

        die(json_encode(array('tbl' => $output, 'opening_bal' => $OpeningBal, 'recon_searchbankname' => $recon_searchbankname)));

        break;


    case 3:
        $output = '';

        $output .= '<div style="width:100%;height:90%;background-color:#fff;padding-bottom:80px;">';
        $output .= '<h5 style="margin:10px 0; padding:8px 5px 5px 24px;"> ONBOARD BALANCES</h5>';
        $output .= '<div style="width:100%;padding:20px;">
                                    <a class="labels"> Category<span>*</span> </a>
                                    <label for="onboardbals_category" class="bh-visually-hidden">Category</label><select id="onboardbals_category" class="input_field" style="margin-left:10px;">
                                        <option value="">Select an option </option>
                                        <option value="Bank">Bank </option>
                                        <option value="BankNoDepartment">Bank (No Department)</option>
                                        <option value="Debtor">Debtor /Receivables</option>
                                        <option value="Creditor">Creditor /Payables</option>
                                    </select>
                                </div>';
        $output .= '<div id="onboardbals_catarea" style="width:96%;padding:10px;display:flex;min-height:400px;background-color:#f2f2f2;"> </div>';


        $output .= '</div>';

        die($output);

        break;

    case 4:
        $output = '';
        if (isset($_POST['onboardbals_category']) && !empty($_POST['onboardbals_category'])) {
            $onboard_cat = trim(mysqli_real_escape_string($db, $_POST['onboardbals_category']));
            if ($onboard_cat == 'Debtor') {
                $onboard_cat_alt = ' DEBTOR /RECEIVABLES';
            } else if ($onboard_cat == 'Creditor') {
                $onboard_cat_alt = ' CREDITOR /PAYABLES';
            } else if ($onboard_cat == 'Bank') {
                $onboard_cat_alt = 'BANK/CASH WITH ASSOCIATED DEPARTMENT';
            } else if ($onboard_cat == 'BankNoDepartment') {
                $onboard_cat_alt = 'BANK NO ASSOCIATION';
            } else {
                $onboard_cat_alt = strtoupper($onboard_cat);
            }


            $output .= '<div style="width:100%;height:100%;background-color:#fff;">';
            $output .= '<h4 style="margin:10px 0; padding:8px 5px 5px 24px;"> ' . $onboard_cat_alt . '</h4>';
            $output .= '<div style="width:100%;padding:10px;display:grid;grid-template-columns:3fr 3fr;">
                                        <div>
                                            <a class="labels" style="width:80px;">Date<span>*</span> </a>
                                            <input id="onboardbals_transdate" type="text" class="input_field" value="' . date('Y/m/d') . '" style="margin-left:10px;width:180px;" placeholder="Select Date">
                                            <input id="onboardbals_subjecttype" type="hidden" value="' . $onboard_cat . '" style="display:none;" readonly>
                                            <div class="cleaner_h10"></div>';
            if ($onboard_cat == 'Debtor') {
                $output .= '<a class="labels" style="width:80px;">Debtor /Receivable <span>*</span> </a>
                            <label for="onboardbals_subjectid" class="bh-visually-hidden">Debtor /Receivable</label><select id="onboardbals_subjectid" class="input_field" style="margin-left:10px;width:220px;"><option value="">Select an option </option>';
                $result = mysqli_query($db, "SELECT CustomerId,Bal,CustomerName FROM creditcustomers WHERE AccountReceivableLedgerID>0 AND IncomeAccountLedgerID>0 AND CustomerName!='CASH' ORDER BY CustomerName DESC ");
                while ($row = mysqli_fetch_assoc($result)) {
                    $output .= '<option value="' . intval($row['CustomerId']) . '">' . trim(stripslashes($row['CustomerName'])) . ' ' . number_format(floatval($row['Bal']), 2, '.', ',') . '</option>';
                }
                $output .= '</select>';
                $output .= '<div class="cleaner_h10"></div>';
                $output .= '<a class="labels" style="width:80px;">Department (Income)<span>*</span> </a>
                                <label for="onboardbals_departmentid" class="bh-visually-hidden">Department (Income)</label><select id="onboardbals_departmentid" class="input_field" style="margin-left:10px;width:220px;"><option value="">Select an option </option>';
                $resultIncomeDepartment = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM ledgers WHERE `type`='Income' AND mainLedgerId=635 AND `category`='Department' ORDER BY CAST(bal AS UNSIGNED) DESC ");
                while ($rowIncomeDepartment = mysqli_fetch_assoc($resultIncomeDepartment)) {
                    $output .= '<option value="' . intval($rowIncomeDepartment['ledgerid']) . '">' . trim(stripslashes($rowIncomeDepartment['name'])) . ' </option>';
                }
                $output .= '</select>';
                $output .= '<div class="cleaner_h10"></div>';
            } else if ($onboard_cat == 'Creditor') {
                $output .= '<a class="labels" style="width:80px;"> Creditor /Payable<span>*</span> </a>
                            <label for="onboardbals_subjectid" class="bh-visually-hidden">Creditor /Payable</label><select id="onboardbals_subjectid" class="input_field" style="margin-left:10px;width:220px;"><option value="">Select an Option </option>';
                $result = mysqli_query($db, "SELECT CustomerId,Bal,CustomerName FROM creditsuppliers ORDER BY CustomerName DESC ");
                while ($row = mysqli_fetch_assoc($result)) {
                    $output .= '<option value="' . intval($row['CustomerId']) . '">' . trim(stripslashes($row['CustomerName'])) . ' ' . number_format(floatval($row['Bal']), 2, '.', ',') . '</option>';
                }
                $output .= '</select>';
                $output .= '<div class="cleaner_h10"></div>';
                $output .= '<a class="labels" style="width:80px;">Department (Expense)<span>*</span> </a>
                                <label for="onboardbals_departmentid" class="bh-visually-hidden">Department (Expense)</label><select id="onboardbals_departmentid" class="input_field" style="margin-left:10px;width:220px;"><option value="">Select an Option </option>';
                $resultIncomeDepartment = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM ledgers WHERE `type`='Expense' AND `category`='Department' ORDER BY CAST(bal AS UNSIGNED) DESC ");
                while ($rowIncomeDepartment = mysqli_fetch_assoc($resultIncomeDepartment)) {
                    $output .= '<option value="' . intval($rowIncomeDepartment['ledgerid']) . '">' . trim(stripslashes($rowIncomeDepartment['name'])) . ' </option>';
                }
                $output .= '</select>';
                $output .= '<div class="cleaner_h10"></div>';
            } else if ($onboard_cat == 'Bank') {
                $output .= '<a class="labels" style="width:80px;"> Bank/Cash<span>*</span> </a>
                            <label for="onboardbals_subjectid" class="bh-visually-hidden">Bank/Cash</label><select id="onboardbals_subjectid" class="input_field" style="margin-left:10px;width:220px;"><option value="">Select an Option </option>';
                $result = mysqli_query($db, "SELECT `ledgerid`,`name`,`bal` FROM ledgers WHERE `ledgerid` IN(SELECT `ledgerid` FROM ledgers WHERE `type`='Asset' AND `category`='Bank' ORDER BY ledgerid ASC) OR `ledgerid` IN(SELECT `ledgerid` FROM ledgers WHERE `type`='Asset' AND isMainLedger=0 AND `category`='Cash' ORDER BY ledgerid ASC) ");
                while ($row = mysqli_fetch_assoc($result)) {
                    $output .= '<option value="' . intval($row['ledgerid']) . '">' . trim(stripslashes($row['name'])) . '  ' . number_format(floatval($row['bal']), 2, '.', ',') . '</option>';
                }
                $output .= '</select>';

                $output .= '<div class="cleaner_h10"></div>';
                $output .= '<a class="labels" style="width:80px;">Department (Income)<span>*</span> </a>
                                <label for="onboardbals_departmentid" class="bh-visually-hidden">Department (Income)</label><select id="onboardbals_departmentid" class="input_field" style="margin-left:10px;width:220px;"><option value="">Select an Option </option>';
                $resultIncomeDepartment = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM ledgers WHERE `type`='Income' AND mainLedgerId=635 AND `category`='Department' ORDER BY CAST(bal AS UNSIGNED) DESC ");
                while ($rowIncomeDepartment = mysqli_fetch_assoc($resultIncomeDepartment)) {
                    $output .= '<option value="' . intval($rowIncomeDepartment['ledgerid']) . '">' . trim(stripslashes($rowIncomeDepartment['name'])) . ' </option>';
                }
                $output .= '</select>';
                $output .= '<div class="cleaner_h10"></div>';
            } else if ($onboard_cat == 'BankNoDepartment') {
                $output .= '<a class="labels" style="width:80px;"> Bank/Cash<span>*</span> </a>
                            <label for="onboardbals_subjectid" class="bh-visually-hidden">Bank/Cash</label><select id="onboardbals_subjectid" class="input_field" style="margin-left:10px;width:220px;"><option value="">Select an option </option>';
                $result = mysqli_query($db, "SELECT `ledgerid`,`name`,`bal` FROM ledgers WHERE `ledgerid` IN(SELECT `ledgerid` FROM ledgers WHERE `type`='Asset' AND `category`='Bank' ORDER BY ledgerid ASC) OR `ledgerid` IN(SELECT `ledgerid` FROM ledgers WHERE `type`='Asset' AND isMainLedger=0 AND `category`='Cash' ORDER BY ledgerid ASC) ");
                while ($row = mysqli_fetch_assoc($result)) {
                    $output .= '<option value="' . intval($row['ledgerid']) . '">' . trim(stripslashes($row['name'])) . '  ' . number_format(floatval($row['bal']), 2, '.', ',') . '</option>';
                }
                $output .= '</select>';

                $output .= '<div class="cleaner_h10"></div>';
            }

            $output .= '</div>';
            $output .= '<div>
                            <a class="labels" style="width:140px;">Current Balance </a>
                            <label for="onboardbals_acnt_currentbal" class="bh-visually-hidden">Current Balance</label><input id="onboardbals_acnt_currentbal" type="text" class="input_field" style="margin-left:10px;width:140px;" autocomplete="off" disabled="disabled">
                            <div class="cleaner_h10"></div>';

            $output .= '<a class="labels" style="width:140px;"> Amount to Add<span>*</span> </a>
                            <input id="onboardbals_transamt" type="text" class="input_field" style="margin-left:10px;width:140px;" placeholder="Enter Amount" autocomplete="off">
                            <div class="cleaner_h10"></div>';


            $output .= '<div style="width:100%;text-align:center;padding:10px;"><button id="saveonboardbals_btn" type="button" class="btn btn-dark btn-sms" style="padding:6px 12px;cursor:pointer;">ADD</button></div>';


            $output .= '</div>';

            $output .= '</div>';


            $output .= '</div>';
        }

        die($output);

        break;

    case 5:
        $output = '';

        $output .= '<div style="width:100%;height:90%;background-color:#fff;padding-bottom:80px;">';
        $output .= '<h5 style="margin:10px 0; padding:8px 5px 5px 24px;"> ASSET MANAGEMENT</h5>';
        $output .= '<div style="width:100%;padding:20px;">
                                    <a class="labels"> Action<span>*</span> </a>
                                    <label for="assetmanagement_action" class="bh-visually-hidden">Action</label><select id="assetmanagement_action" class="input_field" style="margin-left:10px;">
                                        <option value="">Select an Option </option>
                                        <option value="Register">Register Asset </option>
                                        <option value="Purchase">Purchase Asset </option>
                                    </select>
                                </div>';
        $output .= '<div id="asset_management_container" style="width:96%;padding:10px;display:flex;min-height:400px;background-color:#f2f2f2;"> </div>';


        $output .= '</div>';

        die($output);

        break;

    case 6:
        $output = '';
        if (isset($_POST['assetmanagement_action']) && !empty($_POST['assetmanagement_action'])) {
            $assetmanagement_action = trim(mysqli_real_escape_string($db, $_POST['assetmanagement_action']));
            if ($assetmanagement_action == 'Register') {
                $assetmanagement_action_alt = ' REGISTER ASSET';
            } else if ($assetmanagement_action == 'Purchase') {
                $assetmanagement_action_alt = ' PURCHASE ASSET';
            } else {
                $assetmanagement_action_alt = strtoupper($assetmanagement_action);
            }

            $output .= '<div style="width:100%;height:100%;background-color:#fff;">';
            $output .= '<h4 style="margin:10px 0; padding:8px 5px 5px 24px;"> ' . $assetmanagement_action_alt . '</h4>';
            $output .= '<div style="width:100%;padding:10px;display:grid;grid-template-columns:3fr 3fr;">';

            $output .= '<div>';



            if ($assetmanagement_action == 'Register') {
                $output .= '<a class="labels" style="width:80px;">Acquisition Date<span>*</span> </a>
                        <input id="assetmanagement_purchasedate" type="text" class="input_field" value="' . date('Y/m/d') . '" style="margin-left:10px;width:180px;" placeholder="Select Date">';
                $output .= '<div class="cleaner_h10"></div>';

                $output .= '<a class="labels" style="width:80px;">Asset Name<span>*</span> </a>
                        <input id="assetmanagement_assetname" type="text" class="input_field" style="margin-left:10px;width:180px;" placeholder="Enter Name" autocomplete="off">';
                $output .= '<div class="cleaner_h10"></div>';

                $output .= '<a class="labels" style="width:80px;">Asset Number<span>*</span> </a>
                        <input id="assetmanagement_assetno" type="text" class="input_field" style="margin-left:10px;width:180px;" placeholder="Asset No." autocomplete="off">';
                $output .= '<div class="cleaner_h10"></div>';

                // $output .= '<a class="labels" style="width:80px;">Category <span>*</span> </a>
                //             <label for="assetmanagement_assetcat" class="bh-visually-hidden">Category</label><select id="assetmanagement_assetcat" class="input_field" style="margin-left:10px;width:220px;"><option value="">Select an option </option>';
                // $result = mysqli_query($db, "SELECT * FROM assetsubcategories  ORDER BY `name` ");
                // while ($row = mysqli_fetch_assoc($result)) {
                //     $output .= '<option value="' . intval($row['id']) . '">' . strtoupper(trim(stripslashes($row['name']))) . ' </option>';
                // }
                // $output .= '</select>';
                // $output .= '<div class="cleaner_h10"></div>';

                $output .= '<a class="labels" style="width:80px;">Account<span>*</span> </a>
                                <label for="assetmanagement_assetacntid" class="bh-visually-hidden">Account</label><select id="assetmanagement_assetacntid" class="input_field" style="margin-left:10px;width:220px;"><option value="">Select an option </option>';
                $resultAssetAcnt = mysqli_query($db, "SELECT ledgerid,`name` FROM ledgers WHERE `type`='Asset' AND `category`='PhysicalAsset' AND mainLedgerId=1086 ");
                while ($rowAssetAcnt = mysqli_fetch_assoc($resultAssetAcnt)) {
                    $output .= '<option value="' . intval($rowAssetAcnt['ledgerid']) . '">' . trim(stripslashes($rowAssetAcnt['name'])) . ' </option>';
                }
                $output .= '</select>';
                $output .= '<div class="cleaner_h10"></div>';
            } else if ($assetmanagement_action == 'Purchase') {
                $output .= '<a class="labels" style="width:80px;">Purchase Date<span>*</span> </a>
                        <input id="assetmanagement_purchasedate" type="text" class="input_field" value="' . date('Y/m/d') . '" style="margin-left:10px;width:180px;" placeholder="Select Date">';
                $output .= '<div class="cleaner_h10"></div>';
            }

            $output .= '</div>';

            $output .= '<div>';
            $output .= '<a class="labels" style="width:80px;">Department<span>*</span> </a>
                                <label for="assetmanagement_assetdepartment" class="bh-visually-hidden">Department</label><select id="assetmanagement_assetdepartment" class="input_field" style="margin-left:10px;width:220px;"><option value="">Select an option </option>';
            $resultAssetDepartment = mysqli_query($db, "SELECT CatId,ItemCat FROM categories  ");
            while ($rowAssetDepartment = mysqli_fetch_assoc($resultAssetDepartment)) {
                $output .= '<option value="' . trim(stripslashes($rowAssetDepartment['ItemCat'])) . '">' . trim(stripslashes($rowAssetDepartment['ItemCat'])) . ' </option>';
            }
            $output .= '</select>';
            $output .= '<div class="cleaner_h10"></div>';

            $output .= '<a class="labels" style="width:140px;"> Asset Value<span>*</span> </a>
                            <input id="assetmanagement_assetvalue" type="text" class="input_field" style="margin-left:10px;width:140px;" placeholder="Enter Amount" autocomplete="off">
                            <div class="cleaner_h10"></div>';

            $output .= '<div style="width:100%;text-align:center;padding:10px;"><button id="assetmanagement_savebtn" type="button" class="btn btn-dark btn-sms" style="padding:6px 12px;cursor:pointer;">ADD</button></div>';


            $output .= '</div>';

            $output .= '</div>';


            $output .= '</div>';
        }

        die($output);

        break;




    default:
        exit;
        break;
}
