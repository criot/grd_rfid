<?php

include 'connection.php';

if (empty($_POST)) {
    $_POST = json_decode(file_get_contents("php://input"), true) ? : [];
}

if(!empty($_POST['rfidKey'])) {  

    $rfid = $_POST['rfidKey'];

    $query = "SELECT * FROM vehicles WHERE rfid = '".$rfid."'";
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_row($res);

    if($row!=0)  {  
        $myObj = new \stdClass();
        $myObj->id = $row[0];
        $myObj->user_id = $row[1];
        $myObj->rfid = $row[2];
        $myObj->vehicle_no = $row[3];
        echo json_encode($myObj);
    } else {
        $myObj = new \stdClass();
        $myObj->status = false;
        $myObj->message = "RFID Does not Exists";
        echo json_encode($myObj);
    }
} else {
    $myObj = new \stdClass();
    $myObj->status = false;
    echo json_encode($myObj);
}

?>
