<?php
session_start();
if(empty($_SESSION['user_id']))
{
	header('Location:http://localhost/fb/index1.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Facebook Home Page</title>
    <style>
body{
			width:100%;
			background-color:#E5E7E9;
		}
header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 10px;
	padding-bottom: 10px;
	padding-right:20px;
    background-color: #3b5998;
    color: #fff;
    font-size: 18px;
	width:100%;
	position:fixed;
	margin-top:0px;
}
.logo img {
    height: 40px;
} 
.search input[type="text"] {
    padding: 8px 10px;
    border-radius: 20px;
    border: none;
    outline: none;
}
.search button {
    padding: 8px 10px;
    border-radius: 20px;
    border: none;
    background-color: #fff;
    color: #3b5998;
    cursor: pointer;
    margin-left: 10px;
}
.menu ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

.menu li {
    margin-right: 10px;
}

.menu li a {
    color: #fff;
    text-decoration: none;
    padding: 10px;
    border-radius: 20px;
    transition: background-color 0.3s ease;
}
.menu li a:hover {
    background-color: rgba(255,255,255,0.2);
}

/* Main Content */
.content {
    display: flex;
    justify-content: space-between;
    margin: 0px;

}
.left-column{
	position:fixed;
	margin-top:80px;
	margin-left:25px;
}

.left-column img {
    border-radius: 50%;
}

.left-column h2 {
    font-size: 24px;
    margin: 10px 0;
}

.left-column p {
    font-size: 16px;
    color: #666;
}

.left-column ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.left-column li {
    margin: 5px 0;
}

.left-column li a {
    color: #3b5998;
    text-decoration: none;
}
.right-column{
	overflow:auto;
	margin-top:90px;
	margin-left:500px;
	margin-right:400px;
}

/* Posts */
.post {
	background-color:#FDFEFE;
    padding: 20px;
	border:1px light grey;
    border-radius: 10px;
    box-shadow: 0px 0px 8px #888888;
    margin-bottom: 20px;
	width:600px;
}

.post img {
    max-width: 100%;
    border-radius: 15px;
    margin-bottom: 3px;
	margin-left:125px;
	width:350px;
	height:290px;
}

.actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.actions a {
    color: #3b5998;
    text-decoration: none;
    margin-right: 10px;
}

.actions a:hover {
    text-decoration: underline;
}

.actions span {
    font-size: 14px;
    color: #666;
}
#logout:hover{
	background-color:red;
}
    </style>
</head>
<body>

	<header>
		<div class="logo">
			<img src="https://www.facebook.com/images/fb_logo.png" alt="Facebook Logo">
		</div>
		<div class="search">
			<input type="text" placeholder="Search Facebook">
			<button>Search</button>
		</div>
		<div class="menu">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="myposts.php">My Posts</a></li>
				<li><a href="most.php">Top posts</a></li>
				<li><a href="#">Friends</a></li>
				<li><a href="#">Messages</a></li>
				<li><a href="#">Settings</a></li>
				<li><a id="logout" type="submit" href="destroy.php">Logout</a></li>
			</ul>
			
		</div>
	</header>
			<?php
			require_once('db.php');
				$username = $_SESSION['user_id']; 

				$sql = "SELECT * FROM users WHERE username='$username'";
				$result = mysqli_query($conn, $sql);

				mysqli_close($conn);
			?>	
	<div class="content">
		<div class="left-column">
			<img src="uploads/16.jpeg" alt="Profile Picture" width="150px" height="150px" border-radius="15%">
			<?php echo "<h2 name='userid'>".$username."</h2>";?>
			<p>123 Friends</p>
			<ul>
				<li><a href="#">Profile</a></li>
				<li><a href="#">Timeline</a></li>
				<li><a href="#">Photos</a></li>
				<li><a href="#">Friends</a></li>
				<li><a href="#">Messages</a></li>
			</ul>
		</div>
		<div class="right-column">
			<?php
                $servername = "localhost";
				$uname = "vinaykumar";
				$password = "vinay";
				$dbname = "vinaykumar";
				
				$conn = new mysqli($servername, $uname, $password, $dbname);
				
				if ($conn->connect_error) {
				  die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT * FROM images ORDER BY likes DESC";
	            $result = mysqli_query($conn, $sql);
	             if (mysqli_num_rows($result) > 0) {
	            while($row = mysqli_fetch_assoc($result)) {
					echo "<form class='post' method='post' action='like.php' style='padding-top:2px;'>";
					echo  "<h2>".$row['userid']."</h2>";
					echo "<p style='color:grey;font-size:15px;'>".$row['comment']."</p>";
					echo "<div style='width: 600px;'>";
					echo "<hr style='height:1px;border-width:0;background-color:lightgrey;'>";
	                echo "<img src='uploads/" . $row['image'] . "' alt='post'>";
					echo "<hr style='height:1px;border-width:0;background-color:lightgrey'>";
					echo "</div>";
					echo "<div class='actions'>";
					echo "<input name='uid' type='hidden' value=".$username.">";
					echo "<button type='submit' name='iid'  style='font:size 5px;' value=".$row['image'].">Like:<span id='out'>".$row['likes']."</span></button>";
					echo "<a href='#'>Comment</a>";
					echo "<a href='#'>Share</a>";
					echo "<span>".$row["time"]."</span>";
					echo "</div>";
					echo "<hr style='height:1px;border-width:0;background-color:lightgrey;'>";
					echo "</form>";
				}
					} else {
					echo "No images found.";
					}

				mysqli_close($conn);
							?>
			
		</div>
	</div>
</body>
</html>
 