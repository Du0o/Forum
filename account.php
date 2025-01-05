<?php
include "connect.php";
error_reporting(error_level: 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    session_start();
    
    include"header.php";
	
    $account = $_GET['account'];

    $query = "SELECT * FROM users where display_name='$account';"; 
    $result = mysqli_query($conn, $query);

    $account_info = mysqli_fetch_row(result: $result);
	$time_joined = $account_info[5];
	$user_id = $account_info[0];
	$user_password = $account_info[1];
	$user_username = $account_info[2];
	$user_display_name = $account_info[3];
	$admin = $account_info[4];
	$moder = $account_info[6];
	$owner = $account_info[7];
	
	$query = "SELECT * FROM threads where rawname='$user_display_name' ORDER BY id DESC";   
    $result = mysqli_query($conn, $query);
    $numPosts = mysqli_num_rows(result: $result); 
    $lastThread = mysqli_fetch_row(result: $result);

	$query = "SELECT * FROM replies where rawname='$user_display_name' ORDER BY id DESC";   
    $result = mysqli_query($conn, $query);
	$numPosts += mysqli_num_rows(result: $result); 
    ?>
	<div class="container">
		<center>
			<h1><?php echo $user_display_name?></h1>
		
		<hr class="subforum-divider">
		<span>Joined On: <?php echo $time_joined?>
		<?php if($admin == 1){echo "| Admin";} else if($_SESSION["OWNER"] == 1){echo "<form method='post'><input type='submit' value='Make Admin' name='mkabmin'></form>";}?> 
		<?php if($moder == 1){echo "| Moderator";} else if($_SESSION["ADMIN"] == 1){echo "<form method='post'><input type='submit' value='Make Moderator' name='mkmoder'></form>";}?> 
		<?php if($owner == 1){echo "| Owner";}?> 
		| ID: <?php echo $user_id?></span>
		<br>
		<span>Last Thread Posted: <a href="thread.php?thread=<?php echo $lastThread[0];?>&page=1">Click Here</a> | Number of Posts: <?php echo $numPosts;?></span>
		<hr>
		<?php 
				if(isset($_POST['mkadmin'])) {
					$query = "UPDATE users SET admin = 1 WHERE id = $user_id ";
        			$result = mysqli_query($conn, $query);
				} 
				if(isset($_POST['mkmoder'])) {
					$query = "UPDATE users SET moder = 1 WHERE id = $user_id ";
        			$result = mysqli_query($conn, $query);
				} 

				if(isset($_POST['btnSignOut'])) {
						$_SESSION["DISPLAY_NAME"] = "";
						$_SESSION["USERNAME"] = "";
						$_SESSION["ADMIN"] = 0;
						$_SESSION["OWNER"] = 0;
						$_SESSION["MODER"] = 0;

				} 

				if(isset($_POST['btnChangeUN'])) { 
					$oldUN = $_POST['Ousername'];
					$newUN = $_POST['Nusername'];

					if($oldUN == $user_username){
						$query = "SELECT * FROM users where username='$newUN'";   
						$result = mysqli_query($conn, $query);
						if(mysqli_num_rows($result) == 1) {
							echo "username taken";
							$taken = true;
						} else {

						echo "Username Updated";
						$query = "UPDATE users SET username = '$newUN' WHERE id = $user_id ";
						mysqli_query($conn, $query);
						}
					}
					else{
						echo "Wrong Username";
					}
				}
				

				if(isset($_POST['btnChangeDN'])) { 

					$oldDN = $_POST['Odisname'];
					$newDN = $_POST['Ndisname'];

					if($oldDN == $user_display_name){

						$query = "SELECT * FROM users where display_name='$newDN'";   
						$result = mysqli_query($conn, $query);
						if(mysqli_num_rows($result) == 1) {
							echo "display name taken";
							$taken = true;
						} else {
						echo "Display Name Updated";

						$query = "UPDATE users SET display_name = '$newDN' WHERE id = $user_id ";
						mysqli_query($conn, $query);
						$_SESSION["DISPLAY_NAME"] = $newDW;
						}
					}
					else{
					echo "Wrong Display Name";
					}
				}


				if(isset($_POST['btnChangeP'])) { 
					$oldP = $_POST['Opass'];
					$newP = $_POST['Npass'];

					if($oldP == $user_password){
						
						echo "Password Updated";

						$query = "UPDATE users SET password = '$newP' WHERE id = $user_id ";
						mysqli_query($conn, $query);
					}
					else{
						echo "Wrong Password";
					}
				}

				if(isset($_POST['btnBan'])) {

					
						$query = "DELETE FROM users WHERE users . id = $user_id ";
						mysqli_query($conn, $query);
				
			}
		if($_SESSION["DISPLAY_NAME"] == $user_display_name){
				
				echo "
					<form method='post'>
						<input type='submit' value='Update Username' name='btnChangeUN' href='index.php'>
						<input type='text' name='Ousername' placeholder='Old Username' required>
						<input type='text' name='Nusername' placeholder='New Username' required>

					</form>
					<br>
					<form method='post'>
						<input type='submit' value='Update Password' name='btnChangeP' href='index.php'>
						<input type='password' name='Opass' placeholder='Old Password' required>
						<input type='password' name='Npass' placeholder='New Password' required>

					</form>
					<br>
                    <form method='post'>
						<input type='submit' value='Update Display Name' name='btnChangeDN' href='index.php'>
						<input type='text' name='Odisname' placeholder='Old Display Name' required>
						<input type='text' name='Ndisname' placeholder='New Display Name' required>

					</form>
					<br>
					<form method='post'>
						<input type='submit' value='Sign Out' name='btnSignOut' href='index.php'>
					</form>
					

				";
			}
			if($_SESSION["ADMIN"] == 1 || $_SESSION["OWNER"] == 1){
				echo "
				<form method='post'>
						<input type='submit' value='Ban' name='btnBan' href='index.php'>
				</form>
				";
			}
		?>
		</center>
	</div>
	

</body>
</html>
