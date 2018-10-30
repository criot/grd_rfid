<?php
    header('Access-Control-Allow-Origin: *');

    include 'connection.php';
    $id = $_GET['id'];

    $query = "SELECT * FROM users WHERE id = ".$id;

    $res = mysqli_query($conn,$query);
    $row_array = array();


    while($row = mysqli_fetch_row($res)) {
        $row_array['id']= $row[0];
        $row_array['name']= $row[1];
        $row_array['designation']= $row[2];
        $row_array['fromDate']= $row[3];
    }

    echo json_encode($row_array);


?>
