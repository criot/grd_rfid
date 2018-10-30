<?php
    header('Access-Control-Allow-Origin: *');

    include 'connection.php';
    $rfid = $_GET['rfid'];

    $query = "SELECT * FROM vehicles WHERE rfid = ".$rfid;

    $res = mysqli_query($conn,$query);
    $row_array = array();


    while($row = mysqli_fetch_row($res)) {
        $row_array['id']= $row[0];
        $row_array['user_id']= $row[1];
        $row_array['rfid']= $row[2];
        $row_array['vehicle_no']= $row[3];
    }

    if($row_array) {
        echo json_encode($row_array);

    } else {
        echo 'User Not Registered';

    }


?>
