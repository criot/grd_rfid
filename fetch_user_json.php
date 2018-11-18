<?php

    include 'connection.php';
    
    $id = $_GET['id'];

    $query = "SELECT * FROM users WHERE id = ".$id;

    $res = mysqli_query($conn,$query);
    $row_array = array();


    while($row = mysqli_fetch_row($res)) {
        $row_array['id']= $row[0];
        $row_array['name']= $row[1];
        $row_array['userType']= $row[4];
        $row_array['noOfVehicles']= $row[5];
    }

    echo json_encode($row_array);


?>
