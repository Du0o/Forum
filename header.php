<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ted's Forums</title>
    <link rel="stylesheet" href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.reddit.com%2Fr%2Flibraryofruina%2Fcomments%2F1da2v7p%2Fhow_far_does_vegita_go_in_this_series%2F&psig=AOvVaw11mUOS-vgjSeArCfodaVQo&ust=1727996749980000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCPDauIDp8IgDFQAAAAAdAAAAABAE">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<?php 
session_start();
error_reporting(error_level: 0);

include "connect.php";

$disName = "";
$disName = $_SESSION["DISPLAY_NAME"];


// Create connection

    $query = "SELECT * FROM threads";   
    $result = mysqli_query($conn, $query);
    $d = mysqli_fetch_row(result: $result);
?>

<center>

<div class="brand"><a href="index.php">Ted's Forums</a></div>
<div class="navbar">
    <nav class="navigation">
        <ul class = "nav-list">
            <li class="nav-item">
                <a href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a href="threads.php?forum=0&page=1">Threads</a>
            </li>
            <li class="nav-item">
                <a href="thread.php?thread=<?php echo $d[0]?>&page=1">Most Resent Thread</a>
            </li>
            <li class="nav-item">
                <a href="signup.php">Make A Account</a>
            </li>
            <li class="nav-item">
                <?php
                if($disName == ""){
                    echo "<a href='signin.php'>Sign In</a>";        
                }   
                ?>

            </li>
            <li class="nav-item">
                <a href="account.php?account=<?php echo $disName?> "><?php echo $disName?></a>
            </li>
        </ul>
    </nav>
</div>
</center>
</header>
<body>
</body>
</html>
