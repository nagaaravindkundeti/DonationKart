<?php
// Connect to MySQL database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "donation";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data and insert into database
$name = $_POST['name'];
$address= $_POST['address'];
$mob = $_POST['mob'];
$msg = $_POST['msg'];


$sql = "INSERT INTO contact (name,adddress,mob,msg)
VALUES ('$name', '$address','$mob','$msg')";

if (mysqli_query($conn, $sql)) {
    echo "Message send Successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
