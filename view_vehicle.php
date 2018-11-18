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

$sql = "SELECT id, user_id, rfid, vehicle_no FROM vehicles ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>user_id</th><th>rfid</th><th>vehicle_no</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["user_id"]. "</td><td>" . $row["rfid"]. 
        "</td><td>" . $row["vehicle_no"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?> 

</body>
</html>