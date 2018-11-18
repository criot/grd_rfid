<?php

include 'connection.php';

if (empty($_POST)) {
    $_POST = json_decode(file_get_contents("php://input"), true) ? : [];
}

if(!empty($_POST['securityId']) && !empty($_POST['rfidBtId']) 
&& !empty($_POST['rfidKey'])) {  

    $rfid = $_POST['rfidKey'];
    $securityId = $_POST['securityId'];
    $rfidBtId = $_POST['rfidBtId'];
    $entry = $_POST['entry'];
    $jsGateTime = $_POST['gateTime'];
    $jsDateTS = strtotime($jsGateTime);
    $gateTime =  date('Y-m-d H:i:s', $jsDateTS );

    $query = "SELECT * FROM vehicles WHERE rfid = '" . $rfid . "'";
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_row($res);

    if($row!=0)  {  

        $vehicleId = $row[0];

        $sql = "INSERT INTO in_out_entry(gate_keeper_id, reader_id, 
        vehicle_id, vehicle_entry, gate_time) VALUES ($securityId, 
        $rfidBtId, $vehicleId, '" . $entry . "','" . $gateTime . "')";

        if ($conn->query($sql) === TRUE) {

            $myObj = new \stdClass();
            $myObj->rfid = $row[2];
            $myObj->vehicle_no = $row[3];
            $myObj->message = $row[3];
            $myObj->status = true;
            $myObj->entry = $entry;
            $myObj->time = $gateTime;

            echo json_encode($myObj);
        } else {
            $myObj = new \stdClass();
            $myObj->status = false;
            $myObj->message = "Entry cannot be Made";
            echo json_encode($myObj);
        }
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
