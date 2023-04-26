<?php

session_start();

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "donation";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['userid'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    header("Location: index.html");
} else {
    echo "Invalid email or password";
}

mysqli_close($conn);
?>
