<?php
session_start();
require_once('db.php');

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$_SESSION['user_id'] = $row['fname'].$row['lname'];
	header("Location: home.php");
} else {
	header("Location: index1.php");
}
$stmt->close();
$conn->close();
?>
