<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
    header("Access-Control-Allow-Headers: *");

    include 'connection.php';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    # Get JSON as a string
    $json_str = file_get_contents('php://input');

    # Get as an object
    $json_obj = json_decode($json_str);

    $user_id = $json_obj->{'user_id'};
    $veh_no = $json_obj->{'vehicleNumber'};
    $rfid = $json_obj->{'rfidKey'};

    $sql = "INSERT INTO vehicles(user_id, rfid, vehicle_no) 
            VALUES ($user_id, $rfid, " . "'" . $veh_no . "'". ")";

    if ($conn->query($sql) === TRUE) {
        $arr = array('status' => 1);
        echo json_encode($arr);
    } else {
        $arr = array('status' => 0);
        echo json_encode($arr);                
    }

    $conn->close();
?>