<?php
require_once(__DIR__ . '/../includes/db_fns.php');
require_once('./fun.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['valid_user']) && isset($_POST['src_id'])) {
    $username = trim(mysqli_real_escape_string($db, filter_var($_SESSION['valid_user'], FILTER_SANITIZE_EMAIL)));
    $SRC_ID = intval($_POST['src_id']);
} else {
    header('location: ../index.php');
    exit;
}

switch ($SRC_ID) {
    case 1:
        if (isset($_POST['new_subledger_ledgerid']) && isset($_POST['new_subledger_name'])) {
            $new_subledger_ledgerid = intval($_POST['new_subledger_ledgerid']);
            $new_subledger_name = trim(preg_replace("~'~", "", trim(strtoupper(mysqli_real_escape_string($db, $_POST['new_subledger_name'])))));
            $result = mysqli_query($db, "SELECT `ledgerid` FROM ledgers WHERE ( `name`='" . strtolower($new_subledger_name) . "' OR `name`='" . ucwords(strtolower($new_subledger_name)) . "' OR `name`='" . $new_subledger_name . "') AND `mainLedgerId`='" . $new_subledger_ledgerid . "' ");
            if (mysqli_num_rows($result) > 0) {
                die('<p><img src="images/delete.png" style="width:30px; height:30px"></p>');
            } else {
                $resultb = mysqli_query($db, "SELECT `name`,`type`,`category` FROM ledgers WHERE `ledgerid`='" . $new_subledger_ledgerid . "' LIMIT 0,1");
                if (mysqli_num_rows($resultb) > 0) {
                    $rowb = mysqli_fetch_assoc($resultb);
                    $type = trim(stripslashes($rowb['type']));
                    $name = trim(stripslashes($rowb['name']));
                    $category = trim(stripslashes($rowb['category']));
                    $newIdResult = mysqli_query($db, "SELECT `ledgerid` FROM `ledgers` ORDER BY `ledgerid` DESC LIMIT 0,1 ");
                    $rowNewId = mysqli_fetch_assoc($newIdResult);
                    $new_ledgerid = intval($rowNewId['ledgerid']);
                    do {
                        $new_ledgerid += 1;
                        $result4 = mysqli_query($db, "SELECT id FROM ledgers WHERE ledgerid='" . $new_ledgerid . "' ");
                    } while (mysqli_num_rows($result4) > 0);

                    @mysqli_query($db, "INSERT INTO ledgers VALUES('','" . $new_ledgerid . "','" . $new_subledger_name . "','" . $type . "','0',1,'" . date('d/m/Y') . "','" . $category . "',1,'" . $new_subledger_ledgerid . "',0,null,null,'" . date('Y-m-d H:i:s') . "','" . date('Y-m-d H:i:s') . "','" . $username . "','uno','dos','tres','cuatro','cinco','seis')");
                    if (mysqli_affected_rows($db) > 0) {
                        @mysqli_query($db, "UPDATE ledgers SET `isMainLedger`=1 WHERE `ledgerid`='" . $new_subledger_ledgerid . "' ");
                        @mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Creates new " . $name . " sub-ledger: " . $new_subledger_name . ": ledgerid: " . $new_ledgerid . " ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
                        die('<p><img src="images/tick.png" style="width:30px; height:30px"></p> <script>paginate(8,0);</script>');
                    } else {
                        die('<p><img src="images/delete.png" style="width:30px; height:30px"></p>');
                    }
                } else {
                    die('<p><img src="images/delete.png" style="width:30px; height:30px"></p>');
                }
            }
        } else {
            die('<p style="text-align:center;">Bad Request.</p>');
        }


        break;

    case 2:
        if (isset($_POST['ledger']) && isset($_POST['type']) && isset($_POST['cat'])) {
            $type = trim(mysqli_real_escape_string($db, $_POST['type']));
            $cat = trim(mysqli_real_escape_string($db, $_POST['cat']));
            $ledger = preg_replace("~'~", "", trim(strtoupper(mysqli_real_escape_string($db, $_POST['ledger']))));
            $newledgerhassubledgers_cb = intval($_POST['newledgerhassubledgers_cb']);

            if ($type == '' || $cat == '' || $ledger == '') {
                die('<p><img src="images/delete.png" style="width:30px; height:30px"></p>');
            }

            $result1 = mysqli_query($db, "SELECT `ledgerid` FROM ledgers WHERE `name`='" . ucwords(strtolower($ledger)) . "' OR `name`='" . strtolower($ledger) . "' OR `name`='" . $ledger . "' ");
            if (mysqli_num_rows($result1) > 0) {
                die('<p><img src="images/delete.png" style="width:30px; height:30px"></p>');
            } else {
                $newIdResult = mysqli_query($db, "SELECT `ledgerid` FROM `ledgers` ORDER BY `ledgerid` DESC LIMIT 0,1 ");
                $rowNewId = mysqli_fetch_assoc($newIdResult);
                $new_ledgerid = intval($rowNewId['ledgerid']);
                do {
                    $new_ledgerid += 1;
                    $result4 = mysqli_query($db, "SELECT id FROM ledgers WHERE ledgerid='" . $new_ledgerid . "' ");
                } while (mysqli_num_rows($result4) > 0);

                $result = mysqli_query($db, "INSERT INTO ledgers VALUES('','" . $new_ledgerid . "','" . $ledger . "','" . $type . "','0',1,'" . date('d/m/Y') . "','" . $cat . "',0,0,'" . $newledgerhassubledgers_cb . "',null,null,'" . date('Y-m-d H:i:s') . "','" . date('Y-m-d H:i:s') . "','" . $username . "','uno','dos','tres','cuatro','cinco','seis')");
                if ($result) {
                    @mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Creates new " . $type . " ledger: " . $ledger . " ledgerid: " . $new_ledgerid . " ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
                    echo '<p><img src="images/tick.png" style="width:30px; height:30px"></p>';
                    echo "<script>paginate(8,0);</script>";
                    exit;
                } else {
                    die('<p><img src="images/delete.png" style="width:30px; height:30px"></p>');
                }
            }
        } else {
            die('<p style="text-align:center;">Bad Request.</p>');
        }


        break;

    case 3:
        if (isset($_POST['lid'])) {
            $subledgers = array();
            $mainLedgerid = intval($_POST['lid']);
            $mcat = trim(mysqli_real_escape_string($db, $_POST['mcat']));
            $resultP = mysqli_query($db, "SELECT `ledgerid`,`name` FROM ledgers WHERE `category`='" . $mcat . "' AND `mainLedgerId`='" . $mainLedgerid . "'  ");
            while ($rowP = mysqli_fetch_assoc($resultP)) {
                $subledgers[] = $rowP;
            }

            die(json_encode($subledgers));
        } else {
            die("<script>$().customAlert();alert('ERROR', '<p>Bad Request</p>');e.preventDefault();</script>");
        }

        break;

    case 4:
        if (isset($_POST['onboardbals_transdate']) && isset($_POST['onboardbals_transamt']) && isset($_POST['onboardbals_subjectid']) && isset($_POST['onboardbals_subjecttype'])) {
            if (!empty($_POST['onboardbals_transdate']) && !empty($_POST['onboardbals_transamt']) && !empty($_POST['onboardbals_subjectid']) && !empty($_POST['onboardbals_subjecttype'])) {
                $onboardbals_subjectid = intval($_POST['onboardbals_subjectid']);
                $onboardbals_transamt = floatval(preg_replace('~,~', '', $_POST['onboardbals_transamt']));
                $onboardbals_transdate = trim(mysqli_real_escape_string($db, $_POST['onboardbals_transdate']));
                $onboardbals_subjecttype = trim(mysqli_real_escape_string($db, $_POST['onboardbals_subjecttype']));
                if ($onboardbals_subjecttype != 'BankNoDepartment') {
                    $onboardbals_department_ledgerid = intval($_POST['onboardbals_departmentid']);
                } else {
                    $onboardbals_department_ledgerid = 0;
                }

                $date = date('Y/m/d');
                $stamp = date('Ymd');

                if ($onboardbals_transamt == 0 || $onboardbals_transamt < 0) {
                    die('Please enter valid opening balance amount and try again');
                }

                if ($onboardbals_subjectid == 0) {
                    die('Please select a valid ' . strtolower($onboardbals_subjecttype) . ' and try again');
                }

                if ($onboardbals_subjecttype != 'BankNoDepartment' && $onboardbals_department_ledgerid == 0) {
                    die('Please select a department and try again');
                }

                if ($onboardbals_subjecttype == 'Debtor') {
                    $result = mysqli_query($db, "SELECT Bal,CustomerName,AccountReceivableLedgerID,IncomeAccountLedgerID FROM creditcustomers WHERE CustomerId='" . $onboardbals_subjectid . "' LIMIT 0,1 ");
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $subjectName = trim(stripslashes($row['CustomerName']));
                        $AccountReceivableLedgerID = intval($row['AccountReceivableLedgerID']);
                        $IncomeAccountLedgerID = intval($row['IncomeAccountLedgerID']);
                        //$debtor_acnt_openingbal = floatval(preg_replace('~,~', '', trim($row['Bal'])));

                        $resultb = mysqli_query($db, "SELECT `bal`,`name` FROM ledgers WHERE ledgerid='" . $AccountReceivableLedgerID . "' ");
                        $rowb = mysqli_fetch_assoc($resultb);
                        $debtor_acntreceivable_name = trim(stripslashes($rowb['name']));
                        $debtor_acntreceivable_acnt_openingbal = floatval(preg_replace('~,~', '', trim($rowb['bal'])));
                        $debtor_acntreceivable_acnt_closingbal = $debtor_acntreceivable_acnt_openingbal + floatval($onboardbals_transamt);

                        // $resultc = mysqli_query($db, "SELECT `bal`,`name` FROM ledgers WHERE ledgerid=' " . $IncomeAccountLedgerID . "' ");
                        // $rowc = mysqli_fetch_assoc($resultc);
                        // $debtor_incomeacnt_name = trim(stripslashes($rowc['name']));
                        // $debtor_incomeacnt_openingbal = floatval(preg_replace('~,~', '', trim($rowc['bal'])));
                        $resultc = mysqli_query($db, "SELECT `name`,bal FROM ledgers WHERE ledgerid='" . $onboardbals_department_ledgerid . "' ");
                        $rowc = mysqli_fetch_assoc($resultc);
                        $onboardbals_department_name = strtolower(trim(stripslashes($rowc['name'])));
                        $department_income_acnt_openingbal = floatval(preg_replace('~,~', '', trim($rowc['bal'])));
                        $department_income_acnt_closingbal = $department_income_acnt_openingbal + floatval($onboardbals_transamt);

                        //@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $IncomeAccountLedgerID . "','" . $debtor_incomeacnt_name . "','" . $AccountReceivableLedgerID . "','" . $debtor_acntreceivable_name . "','" . $onboardbals_transamt . "','Onboarded debtor opening balance. Name: " . $subjectName . " ','" . $onboardbals_transdate . "','" . $onboardbals_transamt . "','" . $onboardbals_transamt . "','" . $stamp . "','','',0,'" . date('d/m/Y') . "-" . date('H:i') . "','0','0','debtor','" . $onboardbals_subjectid . "','" . $subjectName . "',null,'onboard_debtor_opening_balance',null,null,null,0,null,null,796,628,null,null,null,'OPENING BALANCE','','" . $username . "','0','0','','',null)");
                        @mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $onboardbals_department_ledgerid . "','" . $onboardbals_department_name . "','" . $AccountReceivableLedgerID . "','" . $debtor_acntreceivable_name . "','" . $onboardbals_transamt . "','Onboarded debtor balance. Name: " . $subjectName . " ','" . $onboardbals_transdate . "','" . $department_income_acnt_closingbal . "','" . $debtor_acntreceivable_acnt_closingbal . "','" . $stamp . "','','',0,'" . date('d/m/Y') . "-" . date('H:i') . "','" . $department_income_acnt_openingbal . "','" . $debtor_acntreceivable_acnt_openingbal . "','debtor','" . $onboardbals_subjectid . "','" . $subjectName . "',null,'onboard_debtor_opening_balance',null,null,null,0,null,null,796,628,null,null,null,'ONBOARDED BALANCE','','" . $username . "','0','0','','',null,'uno','dos','tres','cuatro','cinco','seis')");
                        if (mysqli_affected_rows($db) > 0) {
                            @mysqli_query($db, "UPDATE ledgers SET bal='" . $debtor_acntreceivable_acnt_closingbal . "' WHERE ledgerid='" . $AccountReceivableLedgerID . "' ");
                            @mysqli_query($db, "UPDATE ledgers SET bal='" . $department_income_acnt_closingbal . "' WHERE ledgerid='" . $onboardbals_department_ledgerid . "' ");
                            @mysqli_query($db, "UPDATE creditcustomers SET Bal='" . $debtor_acntreceivable_acnt_closingbal . "' WHERE CustomerId='" . $onboardbals_subjectid . "' ");

                            @mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Onboards " . ucfirst($onboardbals_subjecttype) . " Name: " . $subjectName . " opening balance. Amount: " . $onboardbals_transamt . " ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
                            die('Debtor opening balance onboarded successfully!');
                        } else {
                            die('Error processing request. Please try again later.');
                        }
                    } else {
                        die('Debtor account not found');
                    }
                } else if ($onboardbals_subjecttype == 'Creditor') {
                    $result = mysqli_query($db, "SELECT Bal,CustomerName FROM creditsuppliers WHERE CustomerId='" . $onboardbals_subjectid . "' LIMIT 0,1 ");
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $creditor_acnt_openingbal = floatval(preg_replace('~,~', '', trim($row['Bal'])));
                        $subjectName = trim(stripslashes($row['CustomerName']));
                        $creditor_acnt_closingbal = $creditor_acnt_openingbal + floatval($onboardbals_transamt);

                        $resultc = mysqli_query($db, "SELECT `name`,bal FROM ledgers WHERE ledgerid='" . $onboardbals_department_ledgerid . "' ");
                        $rowb = mysqli_fetch_assoc($resultc);
                        $onboardbals_department_name = strtolower(trim(stripslashes($rowb['name'])));
                        $department_expense_acnt_openingbal = floatval($rowb['bal']);
                        $department_expense_acnt_closingbal = $department_expense_acnt_openingbal + floatval($onboardbals_transamt);

                        $resultc = mysqli_query($db, "SELECT `name`,bal FROM ledgers WHERE ledgerid=629 ");
                        $rowc = mysqli_fetch_assoc($resultc);
                        $acntpayable_openingbal = floatval(preg_replace('~,~', '', trim($rowc['bal'])));
                        $acntpayable_closingbal = $acntpayable_openingbal + floatval($onboardbals_transamt);

                        @mysqli_query($db, "INSERT INTO ledgerentries VALUES('','629','Accounts Payable','" . $onboardbals_department_ledgerid . "','" . $onboardbals_department_name . "','" . $onboardbals_transamt . "','Onboarded creditor opening balance. Name: " . $subjectName . " ','" . $onboardbals_transdate . "','" . $acntpayable_closingbal . "','" . $department_expense_acnt_closingbal . "','" . $stamp . "','','',0,'" . date('d/m/Y') . "-" . date('H:i') . "','" . $acntpayable_openingbal . "','" . $department_expense_acnt_openingbal . "','creditor','" . $onboardbals_subjectid . "','" . $subjectName . "',null,'onboard_creditor_opening_balance',null,null,null,0,null,null,null,null,null,null,null,'ONBOARDED BALANCE','','" . $username . "','0','0','','',null,'uno','dos','tres','cuatro','cinco','seis')");
                        if (mysqli_affected_rows($db) > 0) {
                            @mysqli_query($db, "UPDATE ledgers SET bal='" . $acntpayable_closingbal . "' WHERE ledgerid=629 ");
                            @mysqli_query($db, "UPDATE ledgers SET bal='" . $department_expense_acnt_closingbal . "' WHERE ledgerid='" . $onboardbals_department_ledgerid . "' ");
                            @mysqli_query($db, "UPDATE creditsuppliers SET Bal='" . $creditor_acnt_closingbal . "' WHERE CustomerId='" . $onboardbals_subjectid . "' ");

                            @mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Onboards " . ucfirst($onboardbals_subjecttype) . " Name: " . $subjectName . " opening balance. Amount: " . $onboardbals_transamt . " ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
                            die('Creditor opening balance onboarded successfully!');
                        } else {
                            die('Error processing request. Please try again later.');
                        }
                    } else {
                        die('Creditor account not found');
                    }
                } else if ($onboardbals_subjecttype == 'BankNoDepartment') {
                    $result = mysqli_query($db, "SELECT `bal`,`name`,`category`,mainLedgerId FROM ledgers WHERE ledgerid='" . $onboardbals_subjectid . "' LIMIT 0,1 ");
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $mainLedgerId = intval($row['mainLedgerId']);
                        $onboardedbal_ledger_openingbal = floatval(preg_replace('~,~', '', trim($row['bal'])));
                        $bankorcash_name = trim(stripslashes($row['name']));
                        $category_name = strtolower(trim(stripslashes($row['category'])));
                        $onboardedbal_ledger_closingbal = $onboardedbal_ledger_openingbal + floatval($onboardbals_transamt);

                        $resultc = mysqli_query($db, "SELECT `name`,bal FROM ledgers WHERE ledgerid=1085 ");
                        $rowc = mysqli_fetch_assoc($resultc);
                        $retained_earnings_acnt_openingbal = floatval(preg_replace('~,~', '', trim($rowc['bal'])));
                        $retained_earnings_acnt_closingbal = $retained_earnings_acnt_openingbal + floatval($onboardbals_transamt);

                        @mysqli_query($db, "INSERT INTO ledgerentries VALUES('','1085','Retained Earnings','" . $onboardbals_subjectid . "','" . $bankorcash_name . "','" . $onboardbals_transamt . "','Onboarded " . $category_name . " balance. Bank: " . $bankorcash_name . " ','" . $onboardbals_transdate . "','" . $retained_earnings_acnt_closingbal . "','" . $onboardedbal_ledger_closingbal . "','" . $stamp . "','','',0,'" . date('d/m/Y') . "-" . date('H:i') . "','" . $retained_earnings_acnt_openingbal . "','" . $onboardedbal_ledger_openingbal . "','" . $category_name . "','" . $onboardbals_subjectid . "','" . $bankorcash_name . "',null,'onboard_bankorcash_opening_balance',null,null,null,0,null,null,null,'" . $mainLedgerId . "',null,null,null,'ONBOARDED BALANCE','','" . $username . "','0','0','','',null,'uno','dos','tres','cuatro','cinco','seis')");
                        if (mysqli_affected_rows($db) > 0) {
                            @mysqli_query($db, "UPDATE ledgers SET bal='" . $retained_earnings_acnt_closingbal . "' WHERE ledgerid=1085 ");
                            @mysqli_query($db, "UPDATE ledgers SET bal='" . $onboardedbal_ledger_closingbal . "' WHERE ledgerid='" . $onboardbals_subjectid . "' ");

                            @mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Onboards " . ucfirst($category_name) . " ledger: " . $bankorcash_name . " balance. Amount: " . $onboardbals_transamt . " ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
                            die('Balance onboarded successfully!');
                        } else {
                            die('Error processing request. Please try again later.');
                        }
                    } else {
                        die('Bank account ledger not found.');
                    }
                } else if ($onboardbals_subjecttype == 'Bank') {
                    $result = mysqli_query($db, "SELECT `bal`,`name`,`category`,mainLedgerId FROM ledgers WHERE ledgerid='" . $onboardbals_subjectid . "' LIMIT 0,1 ");
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $mainLedgerId = intval($row['mainLedgerId']);
                        $onboardedbal_bankacnt_openingbal = floatval(preg_replace('~,~', '', trim($row['bal'])));
                        $bankorcash_name = trim(stripslashes($row['name']));
                        $category_name = strtolower(trim(stripslashes($row['category'])));
                        $onboardedbal_bankacnt_closingbal = $onboardedbal_bankacnt_openingbal + floatval($onboardbals_transamt);

                        $resultc = mysqli_query($db, "SELECT `name`,bal FROM ledgers WHERE ledgerid='" . $onboardbals_department_ledgerid . "' ");
                        $rowc = mysqli_fetch_assoc($resultc);
                        $onboardbals_department_name = strtolower(trim(stripslashes($rowc['name'])));
                        $department_income_acnt_openingbal = floatval($rowc['bal']);
                        $department_income_acnt_closingbal = $department_income_acnt_openingbal + floatval($onboardbals_transamt);

                        @mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $onboardbals_department_ledgerid . "','" . $onboardbals_department_name . "','" . $onboardbals_subjectid . "','" . $bankorcash_name . "','" . $onboardbals_transamt . "','Onboarded " . $onboardbals_department_name . " balance. Bank: " . $bankorcash_name . " ','" . $onboardbals_transdate . "','" . $department_income_acnt_closingbal . "','" . $onboardedbal_bankacnt_closingbal . "','" . $stamp . "','','',0,'" . date('d/m/Y') . "-" . date('H:i') . "','" . $department_income_acnt_openingbal . "','" . $onboardedbal_bankacnt_openingbal . "','" . $category_name . "','" . $onboardbals_subjectid . "','" . $bankorcash_name . "',null,'onboard_bankorcash_opening_balance',null,null,null,0,null,null,null,'" . $mainLedgerId . "',null,null,null,'ONBOARDED BALANCE','','" . $username . "','0','0','','',null,'uno','dos','tres','cuatro','cinco','seis')");
                        if (mysqli_affected_rows($db) > 0) {
                            @mysqli_query($db, "UPDATE ledgers SET bal='" . $onboardedbal_bankacnt_closingbal . "' WHERE ledgerid='" . $onboardbals_subjectid . "' ");
                            @mysqli_query($db, "UPDATE ledgers SET bal='" . $department_income_acnt_closingbal . "' WHERE ledgerid='" . $onboardbals_department_ledgerid . "' ");
                            @mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Onboards " . ucfirst($category_name) . " ledger: " . $bankorcash_name . " balance. Amount: " . $onboardbals_transamt . " ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

                            die('Balance onboarded successfully!');
                        } else {
                            die('Error processing request. Please try again later.');
                        }
                    } else {
                        die('Bank account ledger not found.');
                    }
                }
            } else {
                die('All fields are required.');
            }
        } else {
            die('Bad Request.');
        }

        break;

    case 5:
        if (isset($_POST['reconTxns'])) {
            $reconTxns = json_decode($_POST['reconTxns'], true);
            for ($i = 0; $i < count($reconTxns); $i++) {
                if (isset($reconTxns[$i]['transid'])) {
                    $result = mysqli_query($db, "SELECT id FROM bank_recon WHERE `bankLedgerID`='" . intval($reconTxns[$i]['bankid']) . "' AND `ledgerentriesID`='" . intval($reconTxns[$i]['transid']) . "' LIMIT 0,1 ");
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        @mysqli_query($db, "UPDATE bank_recon SET reconNote='" . trim(mysqli_real_escape_string($db, preg_replace("~'~", "", $reconTxns[$i]['reconnote']))) . "',isConfirmed='" . intval($reconTxns[$i]['confirmed']) . "',updatedBy='" . $username . "' WHERE id='" . intval($row['id']) . "' ");
                    } else {
                        @mysqli_query($db, "INSERT INTO bank_recon (ledgerentriesID,bankLedgerID,reconNote,isConfirmed,createdAt,createdBy) VALUES('" . intval($reconTxns[$i]['transid']) . "','" . intval($reconTxns[$i]['bankid']) . "','" . trim(mysqli_real_escape_string($db, preg_replace("~'~", "", $reconTxns[$i]['reconnote']))) . "','" . intval($reconTxns[$i]['confirmed']) . "','" . date('Y-m-d H:i:s') . "','" . $username . "' ) ");
                    }
                }
            }

            exit(0);
        }

        exit(1);

        break;

    case 6:
        if (isset($_POST['onboarding_subjectid']) && isset($_POST['onboarding_subjecttype'])) {
            if (!empty($_POST['onboarding_subjectid']) && !empty($_POST['onboarding_subjecttype'])) {
                $onboardbals_subjectid = intval($_POST['onboarding_subjectid']);
                $onboardbals_subjecttype = trim(mysqli_real_escape_string($db, $_POST['onboarding_subjecttype']));

                if ($onboardbals_subjectid == 0) {
                    die('Please select a valid ' . strtolower($onboardbals_subjecttype) . ' and try again');
                }

                if ($onboardbals_subjecttype == 'Debtor') {
                    $result = mysqli_query($db, "SELECT CustomerName,Bal,AccountReceivableLedgerID,IncomeAccountLedgerID FROM creditcustomers WHERE CustomerId='" . $onboardbals_subjectid . "' LIMIT 0,1 ");
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $current_balance = number_format(floatval(preg_replace('~,~', '', trim($row['Bal']))), 2, '.', ',');
                        die($current_balance);
                    } else {
                        die(0);
                    }
                } else if ($onboardbals_subjecttype == 'Creditor') {
                    $result = mysqli_query($db, "SELECT CustomerName,Bal FROM creditsuppliers WHERE CustomerId='" . $onboardbals_subjectid . "' LIMIT 0,1 ");
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $current_balance = number_format(floatval(preg_replace('~,~', '', trim($row['Bal']))), 2, '.', ',');
                        die($current_balance);
                    } else {
                        die(0);
                    }
                } else if ($onboardbals_subjecttype == 'Bank' || $onboardbals_subjecttype == 'BankNoDepartment') {
                    $result = mysqli_query($db, "SELECT bal,`name`,`category`,mainLedgerId FROM ledgers WHERE ledgerid='" . $onboardbals_subjectid . "' LIMIT 0,1 ");
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $current_balance = number_format(floatval(preg_replace('~,~', '', trim($row['bal']))), 2, '.', ',');
                        die($current_balance);
                    } else {
                        die(0);
                    }
                }
            } else {
                die('');
            }
        } else {
            die('');
        }

        break;




    default:
        exit;
        break;
}
