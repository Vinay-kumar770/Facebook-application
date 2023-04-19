<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Facebook Login Page</title>
</head>

<body>
    <div class="name-content" align="center">
        <h1 class="logo">Facebook</h1>
        <p>Connect with friends and the world around you on Facebook.</p>
    </div>
    <?php
    $servername = "localhost";
    $username = "vinaykumar";
    $password = "vinay";
    $dbname = "vinaykumar";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT image FROM images ORDER BY RAND() LIMIT 10";
	$result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    $img = array();
    $k=0;
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $img[$k]=$row[0];
        $k+=1;
    }
    ?>
    <div class="content">
        <div class="flex-div">
            <div class="images">
                <div class="img"><?php echo "<img id='out' src='uploads/" . $img[0] . "'>"; ?></div>
                <div class="img"><?php echo "<img id='out' src='uploads/" . $img[1] . "'>"; ?></div>
                <div class="img"><?php echo "<img id='out' src='uploads/" . $img[2] . "'>"; ?></div>
                <div class="img"><?php echo "<img id='out' src='uploads/" . $img[3] . "'>"; ?></div>
                <div class="img"><?php echo "<img id='out' src='uploads/" . $img[4] . "'>"; ?></div>
                <div class="img"><?php echo "<img id='out' src='uploads/" . $img[5] . "'>"; ?></div>
                <div class="img"><?php echo "<img id='out' src='uploads/" . $img[6] . "'>"; ?></div>
                <div class="img"><?php echo "<img id='out' src='uploads/" . $img[7] . "'>"; ?></div>
                <div class="img"><?php echo "<img id='out' src='uploads/" . $img[8] . "'>"; ?></div>
                
            </div>
            <form method="post" action="login.php">
                <input type="text" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required>
                <button class="login" name="login">Log In</button>
                <a href="#">Forgot Password ?</a>
                <hr>
                <a class="create-account" href="http://localhost/fb/register.html">Create New Account</a>
            </form>
        </div>
    </div>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            background: rgba(128, 128, 128, 0.243);
        }


        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .flex-div {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .name-content {
            margin-right: 7rem;
        }

        .name-content .logo {
            font-size: 3.5rem;
            color: #1877f2;
        }

        .name-content p {
            font-size: 1.3rem;
            font-weight: 500;
            margin-bottom: 5rem;
        }

        form {
            display: flex;
            flex-direction: column;
            background: #fff;
            padding: 2rem;
            width: 500px;
            height: 390px;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);
            margin-left: 200px;
        }
        .images{
            display:grid;
            grid-template-columns: auto auto auto;
            column-gap: 10px;
            row-gap: 10px;
            background: #fff;
            width: 600px;
            margin-top:100px;
            height: 600px;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);
        }
        #out{
            width:150px;
            height:150px;
            border-radius: 0.5rem;
        }
        
        .img{
            width: 150px;
            height: 150px;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);
            margin-top: 25px;
            margin-right: 15px;
            margin-left: 25px;
            margin-bottom: 15px;
        }
        .img:hover{
            transform: scale(1.5);
        }


        form input {
            outline: none;
            padding: 0.8rem 1rem;
            margin-bottom: 0.8rem;
            font-size: 1.1rem;
        }

        form input:focus {
            border: 1.8px solid #1877f2;
        }

        form .login {
            outline: none;
            border: none;
            background: #1877f2;
            padding: 0.8rem 1rem;
            border-radius: 0.4rem;
            font-size: 1.1rem;
            color: #fff;
        }

        form .login:hover {
            background: #0f71f1;
            cursor: pointer;
        }

        form a {
            text-decoration: none;
            text-align: center;
            font-size: 1rem;
            padding-top: 0.8rem;
            color: #1877f2;
        }

        form hr {
            background: #f7f7f7;
            margin: 1rem;
        }

        form .create-account {
            outline: none;
            border: none;
            background: #06b909;
            padding: 0.8rem 1rem;
            border-radius: 0.4rem;
            font-size: 1.1rem;
            color: #fff;
            width: 75%;
            margin: 0 auto;
        }

        form .create-account:hover {
            background: #03ad06;
            cursor: pointer;
        }

        @media (max-width: 500px) {
            html {
                font-size: 60%;
            }

            .name-content {
                margin: 0;
                text-align: center;
            }

            form {
                width: 300px;
                height: fit-content;
            }

            form input {
                margin-bottom: 1rem;
                font-size: 1.5rem;
            }

            form .login {
                font-size: 1.5rem;
            }

            form a {
                font-size: 1.5rem;
            }

            form .create-account {
                font-size: 1.5rem;
            }

            .flex-div {
                display: flex;
                flex-direction: column;
            }
        }

        @media (min-width: 501px) and (max-width: 768px) {
            html {
                font-size: 60%;
            }

            .name-content {
                margin: 0;
                text-align: center;
            }

            form {
                width: 300px;
                height: fit-content;
            }

            form input {
                margin-bottom: 1rem;
                font-size: 1.5rem;
            }

            form .login {
                font-size: 1.5rem;
            }

            form a {
                font-size: 1.5rem;
            }

            form .create-account {
                font-size: 1.5rem;
            }

            .flex-div {
                display: flex;
                flex-direction: column;
            }
        }

        @media (min-width: 769px) and (max-width: 1200px) {
            html {
                font-size: 60%;
            }

            .name-content {
                margin: 0;
                text-align: center;
            }

            form {
                width: 300px;
                height: fit-content;
            }

            form input {
                margin-bottom: 1rem;
                font-size: 1.5rem;
            }

            form .login {
                font-size: 1.5rem;
            }

            form a {
                font-size: 1.5rem;
            }

            form .create-account {
                font-size: 1.5rem;
            }

            .flex-div {
                display: flex;
                flex-direction: column;
            }

            @media (orientation: landscape) and (max-height: 500px) {
                .header {
                    height: 90vmax;
                }
            }
        }
    </style>
</body>

</html>