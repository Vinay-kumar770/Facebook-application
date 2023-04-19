<?php
$servername = "localhost";
$username = "vinaykumar";
$password = "vinay";
$dbname = "vinaykumar";
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$email = $_POST['email'];
$password = $_POST['password'];
$fname = $_POST['fn'];
$lname = $_POST['ln'];
//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$username=$fname.$lname;
$sql = "INSERT INTO users (email, password,fname,lname,username) VALUES ('$email', '$password','$fname','$lname','$username')";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Login details saved successfully'); window.location.href = 'http://localhost/fb/index1.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>
