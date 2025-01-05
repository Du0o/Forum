<?php
	include "connect.php";
    error_reporting(error_level: 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
</head>
<body>
    <?php
    include "header.php";
    ?>
    <form method="post">
        <br>
        <input type="submit" value="Signin" name="btnSignin" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
    </form>

    <?php 

	
    
    error_reporting(0);

    $username = $_POST["username"];
    $password = $_POST["password"];

    if(isset($_POST['btnSignin'])) {         
        $query = "SELECT * FROM users where username='$username' and password='$password'";   
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1) {
            echo "Correct";
            $query = "SELECT * FROM users where username='$username' and password='$password'";   
            $result = mysqli_query($conn, $query);
            $account = mysqli_fetch_row($result);
            $_SESSION["DISPLAY_NAME"] = $account[3];
            $_SESSION["USERNAME"] = $account[2];
            $_SESSION["ADMIN"] = $account[4];
            $_SESSION["MODER"] = $account[6];
            $_SESSION["OWNER"] = $account[7];
        }
        else {
            echo "Invalid username or password.";
        }
    }
    ?>
</body>
</html>
