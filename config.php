<?php
$servername = "localhost";
$username = "lightsail";
$password = "lightsail";
$dbname = "isepbike";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>