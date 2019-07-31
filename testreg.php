<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Todo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$fname="Franz";
$lname="Franz";
$username="Franz";
$password="Franz";

$sql = "INSERT INTO users (fname, lname, username, password)
VALUES ('$fname', '$lname', '$username','$password')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>