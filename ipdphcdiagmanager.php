<?php
include __DIR__ . '/includes/db_fns.php';

bh_require_auth();

$request = 1;
if(isset($_POST['request'])){
    $request = $_POST['request'];
}

// DataTable data
if($request == 1){
    ## Read value
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    #$searchValue = $_POST['search']['value']; // Search value
    #$searchValue = $_POST['searchByName']['value']; // Search value

    $searchValue = mysqli_escape_string($db,$_POST['search']['value']); // Search value
    #$searchValue = $_POST['searchByName'];

    ## Search 
    $searchQuery = " ";
    if($searchValue != ''){
        $searchQuery = " and (DiagnosisParentNameParentCode like '%".$searchValue."%' or 
            DiagnosisCode like '%".$searchValue."%' or 
            DiagnosisChildName like'%".$searchValue."%' ) ";
    }

    ## Total number of records without filtering
    $sel = mysqli_query($db,"select count(*) as allcount from tblphcdiagnosis");
    $records = mysqli_fetch_assoc($sel);
    $totalRecords = $records['allcount'];

    ## Total number of records with filtering
    $sel = mysqli_query($db,"select count(*) as allcount from tblphcdiagnosis WHERE 1 ".$searchQuery);
    $records = mysqli_fetch_assoc($sel);
    $totalRecordwithFilter = $records['allcount'];

    ## Fetch records
    $empQuery = "select * from tblphcdiagnosis WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
    $empRecords = mysqli_query($db, $empQuery);
    $data = array();

    while ($row = mysqli_fetch_assoc($empRecords)) {

        // Add New PHC Diagnosis Button |
        #$addNewPhcDButton = "<button aria-label="btn" class='btn btn-sm btn-primary updateUser' data-id='".$row['PHCDiagnosisId']."' data-toggle='modal' data-target='#updateModal'  type="button"><i class='fa fa-plus'></i></button>";

        // save/add New Patient Diagnosis Button
        $addNewButton = "<button aria-label=\"btn\" class='btn btn-success btn-sm nwPacientePHCDiag' data-id='".$row['PHCDiagnosisId']."' data-toggle='modal' data-target='#updtipdPhcDiagnosisModal'  type=\"button\"><i class='fa fa-plus'></i></button>";

        // Update Button
        $updateButton = "<button aria-label=\"btn\" class='btn btn-sm btn-info updtipdPhcDiagnosis' data-id='".$row['PHCDiagnosisId']."' data-toggle='modal' data-target='#updtipdPhcDiagnosisModal'  type=\"button\"><i class='fa fa-plus'></i></button>";

        // Delete Button
        $deleteButton = "<button aria-label=\"btn\" class='btn btn-sm btn-danger deleteUser' data-id='".$row['PHCDiagnosisId']."' type=\"button\"><i class='fa fa-trash-o'></i></button>";
        
        
        $action = $updateButton;
        #$action = $updateButton." ".$deleteButton." ".$addNewButton;
        #$action = $addNewPhcDButton." ".$updateButton." ".$deleteButton." ".$addNewButton;

        $data[] = array(
                "DiagnosisParentNameParentCode" => $row['DiagnosisParentNameParentCode'],
                "DiagnosisChildName" => $row['DiagnosisChildName'],
                "DiagnosisCode" => $row['DiagnosisCode'],
                "action" => $action
            );
    }

    ## Response
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );

    echo json_encode($response);
    exit;
}

// Fetch user details
// if($request == 2){
//     $id = 0;

//     if(isset($_POST['id'])){
//         $id = mysqli_escape_string($db,$_POST['id']);
//     }

//     $record = mysqli_query($db,"SELECT * FROM tblphcdiagnosis WHERE PHCDiagnosisId=".$id);

//     $response = array();

//     if(mysqli_num_rows($record) > 0){
//         $row = mysqli_fetch_assoc($record);
//         $response = array(
//             "parentname" => $row['DiagnosisParentNameParentCode'],
//             "childname" => $row['DiagnosisChildName'],
//             "diagnosiscode" => $row['DiagnosisCode'],
//         );

//         echo json_encode( array("status" => 1,"data" => $response) );
//         exit;
//     }else{
//         echo json_encode( array("status" => 0) );
//         exit;
//     }
// }
if($request == 2){
    $id = 0;

    if(isset($_POST['id'])){
        $id = mysqli_escape_string($db,$_POST['id']);
    }

    // Check id
    $record = mysqli_query($db,"SELECT * FROM tblphcdiagnosis WHERE PHCDiagnosisId=".$id);
    #$record = mysqli_query($db,"SELECT PHCDiagnosisId FROM tblphcdiagnosis WHERE PHCDiagnosisId=".$id);
    if(mysqli_num_rows($record) > 0){
        $row = mysqli_fetch_assoc($record);

        $parent_name = $row['DiagnosisParentNameParentCode'];
        $child_name = $row['DiagnosisChildName'];
        $diagnosis_code = $row['DiagnosisCode'];

        $in_patient_id = mysqli_escape_string($db,trim($_POST['old_patient_id']));
        $in_patient_no = mysqli_escape_string($db,trim($_POST['regn']));
        $in_presc_id = mysqli_escape_string($db,trim($_POST['old_presc_id']));
        $in_presc_no = mysqli_escape_string($db,trim($_POST['old_presc_no']));
        #$diagnosiscode = mysqli_escape_string($db,trim($_POST['diagnosiscode']));


        if( $parent_name != '' && $child_name != '' && $diagnosis_code != '' && $in_patient_id != '' && $in_patient_no != '' && $in_presc_id != '' && $in_presc_no != '' ){

            $record2 = mysqli_query($db,"SELECT * FROM tblprescphcdiagnosis WHERE PHCDiagnosisId='".$id."' AND PatientId= '".$in_patient_id."' AND PatientNo= '".$in_patient_no."' AND PrescId= '".$in_presc_id."' AND PrescNo= '".$in_presc_no."' ");
            if(mysqli_num_rows($record2)==0){
              $phcSqlQry = mysqli_query($db,"INSERT INTO tblprescphcdiagnosis VALUES('','".$id."','".$diagnosis_code."','".$child_name."','".$parent_name."','".$in_patient_id."','".$in_patient_no."','".$in_presc_id."','".$in_presc_no."') ");

                $response = array(
                    "parent_name" => $row['DiagnosisParentNameParentCode'],
                    "child_name" => $row['DiagnosisChildName'],
                    "diagnosis_code" => $row['DiagnosisCode'],
                );
                echo json_encode( array("appco_status" => 1, "status" => 1, "message" => "Record Registered.","appco_status_message" => "Record Registered.", "data" => $response) ); 
                exit;

            }else{
                echo json_encode( array("appco_status" => 0, "status" => 0,"message" => "Transaction Failure.","appco_status_message" => "Transaction Failure.") );
                exit;
            }
    
            // $response = array(
            //     "diagparentname" => $row['DiagnosisParentNameParentCode'],
            //     "diagchildname" => $row['DiagnosisChildName'],
            //     "diagnosis_code" => $row['DiagnosisCode'],
            // );

            // //echo json_encode( array("status" => 1, "data" => $response, "message" => "Record Registered.") );
            // echo json_encode( array("appco_status" => 1, "status" => 1, "message" => "Record Registered.","appco_status_message" => "Record Registered.", "data" => $response) ); 
            // exit;
        }else{
            echo json_encode( array("status" => 0,"message" => "Please fill all fields.") );
            exit;
        }
        
    }else{
        echo json_encode( array("status" => 0,"message" => "Invalid ID.") );
        exit;
    }
}

// Update user
if($request == 3){
    $id = 0;

    if(isset($_POST['id'])){
        $id = mysqli_escape_string($db,$_POST['id']);
    }

    // Check id
    $record = mysqli_query($db,"SELECT PHCDiagnosisId FROM tblphcdiagnosis WHERE PHCDiagnosisId=".$id);
    if(mysqli_num_rows($record) > 0){

        $parentname = mysqli_escape_string($db,trim($_POST['parentname']));
        $childname = mysqli_escape_string($db,trim($_POST['childname']));
        $diagnosiscode = mysqli_escape_string($db,trim($_POST['diagnosiscode']));

        if( $parentname != '' && $childname != '' && $diagnosiscode != '' ){

            mysqli_query($db,"UPDATE tblphcdiagnosis SET DiagnosisParentNameParentCode='".$parentname."', DiagnosisChildName='".$childname."', DiagnosisCode='".$diagnosiscode."' WHERE PHCDiagnosisId=".$id);

            echo json_encode( array("status" => 1,"message" => "Record updated.") );
            exit;
        }else{
            echo json_encode( array("status" => 0,"message" => "Please fill all fields.") );
            exit;
        }
        
    }else{
        echo json_encode( array("status" => 0,"message" => "Invalid ID.") );
        exit;
    }
}

// Delete User
if($request == 4){
    $id = 0;

    if(isset($_POST['id'])){
        $id = mysqli_escape_string($db,$_POST['id']);
    }

    // Check id
    $record = mysqli_query($db,"SELECT PHCDiagnosisId FROM tblphcdiagnosis WHERE PHCDiagnosisId=".$id);
    if(mysqli_num_rows($record) > 0){

        mysqli_query($db,"DELETE FROM tblphcdiagnosis WHERE PHCDiagnosisId=".$id);

        echo 1;
        exit;
    }else{
        echo 0;
        exit;
    }
}