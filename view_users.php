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

$sql = "SELECT id, first_name, userid, user_type, no_of_vehicles FROM users ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>first_name</th><th>userid</th><th>user_type</th><th>no_of_vehicles</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>". $row["first_name"]. "</td><td>" . $row["userid"]. "</td><td>" . 
        $row["user_type"]. "</td><td>" . $row["no_of_vehicles"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?> 

</body>
</html>