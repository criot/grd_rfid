<?php

    include 'connection.php';
   
    if (empty($_POST)) {
        $_POST = json_decode(file_get_contents("php://input"), true) ? : [];
    }

    if(!empty($_POST['user_id']) && !empty($_POST['vehicleNumber'])) {  

        $user_id = $_POST['user_id'];
        $veh_no = $_POST['vehicleNumber'];
        $rfid = $_POST['rfidKey'];

        $sql = "INSERT INTO vehicles(user_id, rfid, vehicle_no) 
                VALUES ($user_id, '" . $rfid . "','" . $veh_no . "')";

        if ($conn->query($sql) === TRUE) {
            $arr = array('status' => true);
            echo json_encode($arr);
        } else {
            $arr = array('status' => false);
            echo json_encode($arr);                
        }

}else {
    $myObj = new \stdClass();
    $myObj->status = false;
    echo json_encode($myObj);
}

?>