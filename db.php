<?php
$servername = "localhost";
$username = "vinaykumar";
$password = "vinay";
$dbname = "vinaykumar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
