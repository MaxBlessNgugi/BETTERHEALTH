<?php

require_once(__DIR__ . '/../includes/db_fns.php');
bh_require_auth();
function guidv4($data = null) {
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function updateItemBatchBalAndBatchInUse($db,$item_code,$action, $batch_no=null, $qty=null){
    switch($action){
        case 'updateBatchNo':
            $result = mysqli_query($db, "SELECT Bal,CurrentBatchInUse FROM items WHERE ItemCode='" . $item_code . "' LIMIT 0,1 ");
            if(mysqli_num_rows($result)>0){
                $row=mysqli_fetch_assoc($result);
                if(floatval($row['Bal'])==0){
                    $resultBNo = mysqli_query($db, "SELECT TransNo,BatchNo2,BatchBal FROM purchases WHERE BatchBal>0 AND ItemCode='" . $item_code . "' ORDER BY StockDate ASC LIMIT 0,1 ");
                    if (mysqli_num_rows($resultBNo) > 0) {
                        $rowBNo = mysqli_fetch_assoc($resultBNo);
                        $batchBal=floatval($rowBNo['BatchBal']);
                        $newbatchNo = trim(stripslashes($rowBNo['BatchNo2']));
                        @mysqli_query($db, "UPDATE items SET Bal='" . $batchBal . "',CurrentBatchInUse='" . $newbatchNo . "' WHERE ItemCode='" . $item_code . "' ");
                        @mysqli_query($db, "UPDATE purchases SET BatchInUse=0 WHERE TransNo !='" . intval($rowBNo['TransNo']) . "' AND ItemCode='" . $item_code . "' ");
                        @mysqli_query($db, "UPDATE purchases SET BatchInUse=1 WHERE TransNo='" . intval($rowBNo['TransNo']) . "' ");
                        return $newbatchNo;
                    }

                }else{
                    if(trim(stripslashes($row['CurrentBatchInUse']))==''){
                        $resultBN = mysqli_query($db, "SELECT TransNo,BatchNo2 FROM purchases WHERE BatchBal>0 AND BatchInUse=1 AND ItemCode='" . $item_code . "' ORDER BY StockDate ASC LIMIT 0,1 ");
                        if (mysqli_num_rows($resultBN) > 0) {
                            $rowBN = mysqli_fetch_assoc($resultBN);
                            $newbatchNo= trim(stripslashes($rowBN['BatchNo2']));
                            @mysqli_query($db, "UPDATE items SET CurrentBatchInUse='" . $newbatchNo . "' WHERE ItemCode='" . $item_code . "' ");
                            @mysqli_query($db, "UPDATE purchases SET BatchInUse=0 WHERE TransNo !='" . intval($rowBN['TransNo']) . "' AND ItemCode='" . $item_code . "' ");
                            @mysqli_query($db, "UPDATE purchases SET BatchInUse=1 WHERE TransNo='" . intval($rowBN['TransNo']) . "' ");
                            return $newbatchNo;

                        }else{
                            $resultBNo = mysqli_query($db, "SELECT TransNo,BatchNo2 FROM purchases WHERE BatchBal>0 AND ItemCode='" . $item_code . "' ORDER BY StockDate ASC LIMIT 0,1 ");
                            if (mysqli_num_rows($resultBNo) > 0) {
                                $rowBNo = mysqli_fetch_assoc($resultBNo);
                                $newbatchNo = trim(stripslashes($rowBNo['BatchNo2']));
                                @mysqli_query($db, "UPDATE items SET CurrentBatchInUse='" . $newbatchNo . "' WHERE ItemCode='" . $item_code . "' ");
                                @mysqli_query($db, "UPDATE purchases SET BatchInUse=0 WHERE TransNo !='" . intval($rowBNo['TransNo']) . "' AND ItemCode='" . $item_code . "' ");
                                @mysqli_query($db, "UPDATE purchases SET BatchInUse=1 WHERE TransNo='" . intval($rowBNo['TransNo']) . "' ");
                                return $newbatchNo;
                            }
                        }
                    }
                }
            }

            return 'item not found';
        break;

        case 'reducePurchasesBatchBal':
            $resultBNo = mysqli_query($db, "SELECT TransNo,BatchNo2,BatchBal FROM purchases WHERE ItemCode='" . $item_code . "' AND BatchNo2='" . $batch_no . "' LIMIT 0,1 ");
            if (mysqli_num_rows($resultBNo) > 0) {
                $rowBNo = mysqli_fetch_assoc($resultBNo);
                $batchBal = floatval($rowBNo['BatchBal']);
                if($batchBal>= $qty){
                    $newbatchBal = $batchBal-floatval($qty);
                    @mysqli_query($db, "UPDATE purchases SET BatchBal='" . $newbatchBal . "' WHERE TransNo='" . intval($rowBNo['TransNo']) . "' ");
                }else{
                    @mysqli_query($db, "UPDATE purchases SET BatchBal=0,BatchInUse=0 WHERE TransNo='" . intval($rowBNo['TransNo']) . "' ");
                    @mysqli_query($db, "UPDATE items SET CurrentBatchInUse='' WHERE ItemCode='" . $item_code . "' ");

                    $unreduced_qty = floatval($qty)-$batchBal;
                    $newbatchNo=updateItemBatchBalAndBatchInUse($db, $item_code, 'updateBatchNo');
                    if($newbatchNo!=''){
                        updateItemBatchBalAndBatchInUse($db, $item_code, 'reducePurchasesBatchBal', $newbatchNo, $unreduced_qty);                   
                    }
                }
            }

        break;

        case 'increasePurchasesBatchBal':
            if($batch_no==''){
                $newbatchNo = updateItemBatchBalAndBatchInUse($db, $item_code, 'updateBatchNo');
                updateItemBatchBalAndBatchInUse($db, $item_code, 'increasePurchasesBatchBal', $newbatchNo, $qty);
            }else{
                $resultBNo = mysqli_query($db, "SELECT TransNo,BatchNo2,BatchBal FROM purchases WHERE ItemCode='" . $item_code . "' AND BatchNo2='" . $batch_no . "' LIMIT 0,1 ");
                if (mysqli_num_rows($resultBNo) > 0) {
                    $rowBNo = mysqli_fetch_assoc($resultBNo);
                    $newbatchBal = floatval($rowBNo['BatchBal']) + floatval($qty);

                    @mysqli_query($db, "UPDATE purchases SET BatchBal='" . $newbatchBal . "' WHERE TransNo='" . intval($rowBNo['TransNo']) . "' ");
                
                }
            }    

            break;

        default:
            return false;
        break;
 
    }

}