<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    include "header.php";
    error_reporting(error_level: 0);
    ?>

    
    <form method="post">
        <br>
        <input type="submit" value="Signup" name="btnSignup" href="index.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="display-name" placeholder="Display Name" required>
    </form>

    <?php
        error_reporting(0);
        $taken = false;
        $servername = "localhost";  
        $username = "root";
        $password = "";
        $en_postsdb = "enpostsdb";

        $conn = new mysqli($servername, $username, $password, $en_postsdb);

        $username = $_POST["username"];
        $password = $_POST["password"];
        $display_name = $_POST["display-name"];

        
        if(isset($_POST['btnSignup'])) {         
            $query = "SELECT * FROM users where username='$username'";   
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) == 1) {
                echo "username taken";
                $taken = true;
            }
            $query = "SELECT * FROM users where display_name='$display_name'";   
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) == 1) {
                echo "<br>display name taken";
                $taken = true;
            }
            if($taken == false) {
                $query = "INSERT INTO users (id, username, password, display_name, admin, time_joined, moder, owner) VALUES (NULL, '$username', '$password', '$display_name', 0, current_timestamp(), 0, 0);";   
                mysqli_query($conn, $query);
                echo"Account added to database.";
                echo'<a href="sighin.php">Go back and signin</a>';    
            }
        }
    ?>
</body>
</html>
