<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
table {
    border-collapse: collapse;
}
</style>
</head>
<body>

<?php
include 'conn.php';

$sql = "SELECT id, gate_keeper_id, reader_id, vehicle_id, vehicle_entry, gate_time, time_stamp FROM in_out_entry 
ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>gate_keeper_id</th><th>reader_id</th>
    <th>vehicle_id</th><th>vehicle_entry</th><th>gate_time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["gate_keeper_id"]. "</td><td>" . $row["reader_id"]. 
        "</td><td>" . $row["vehicle_id"]. "</td><td>" . $row["vehicle_entry"]. "</td><td>" . $row["gate_time"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?> 

</body>
</html>