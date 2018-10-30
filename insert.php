<?php
    header('Access-Control-Allow-Origin: *');

    include 'connection.php';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO in_out_entry('reader_id', 'gate_keeper_id', 'gate_time', 'vehicle_entry', 'vehicle_id') 
            VALUES ($_GET[reader_id], $_GET[gate_keeper_id], $_GET[gate_time], $_GET[vehicle_entry], $_GET[vehicle_id])";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>