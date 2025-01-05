<?php

error_reporting(error_level: 0);

session_start();    

include "connect.php";

$forum = $_GET['forum'];
$page = $_GET['page'];
// Create connection

// Check connection

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ted's Forums</title>
    <link rel="stylesheet" href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.reddit.com%2Fr%2Flibraryofruina%2Fcomments%2F1da2v7p%2Fhow_far_does_vegita_go_in_this_series%2F&psig=AOvVaw11mUOS-vgjSeArCfodaVQo&ust=1727996749980000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCPDauIDp8IgDFQAAAAAdAAAAABAE">
    <link rel="stylesheet" href="style.css">
    <script>
    if(window.history.replaceState){
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</head>
<body>
    <?php 
    include "header.php";
    ?>
    <br>
    <div class="navigate">
        <span><a href="index.php">Home</a> > <a href="#">Forums</a></span>
    </div>
    <br>

    <?php
        $nameex = "";
        if($_SESSION["MODER"] == "1"){
            $nameex = "(MOD)";
        }
        if($_SESSION["ADMIN"] == "1"){
            $nameex = "(ADMIN)";
        }
        if($_SESSION["OWNER"] == "1"){
            $nameex = "(OWNER)";
        }
        //error_reporting(error_level: 0);
        $title = $_POST["title"];
        $text = $_POST["thread-text"];
        $text = str_replace("'", "''", $text);
        $name = $_SESSION["DISPLAY_NAME"] . $nameex;
        $rawname = $_SESSION["DISPLAY_NAME"];

        $image = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'DBImages/'.$image;

        
        //$image = mysqli_real_escape_string($conn,file_get_contents(isset($_FILES["file_image"]["tmp_name"]), true));
        if(isset($_POST['btnThread'])){
            $query = "INSERT INTO threads (id, forum_id, date_posted, name, thread_image, title, content, rawname, pinned) VALUES (NULL, '$forum', current_timestamp(), '$name', '$image',  '$title', '$text', '$rawname', 0);";
            mysqli_query($conn, $query);

            if(move_uploaded_file($tempname, $folder)){
                
            }
            else{
                
            }
        }

        if($_SESSION["DISPLAY_NAME"] != ""){    
            echo "
            <form method='post' enctype='multipart/form-data'>
        <input type='submit' value='Post' name='btnThread'>
        <div class='posts-container'>
        <div class='posts-table'>
            <div class='table-head'>
                <div class='image'>Visual</div>
                <div class='subjects'>Subjects</div>
            </div>
        </div>  
        <div class='table-row'>
            <div class='image'>
                <input name='image' type='file' accept='image/*' id='file' onchange='loadFile(event)'>
                <p><img id='output' width='200' /></p>
                <script type='text/javascript'>
                    const uploadField = document.getElementById('file');
                    var loadFile = function(event) {    
                      var image = document.getElementById('output');
                      image.src = URL.createObjectURL(event.target.files[0]);
                    };
                </script>
            </div>
            <div class='subjects'>
                <input type='text' id='thread-title' placeholder='Title' name='title' required>
                <br>
                <div class='text'>
                    <textarea name='thread-text' cols='10' rows='5' required></textarea></textarea>
                </div>

            </div>

        </div>
    </div>
    </form>
            ";
            
        } else {
            echo "<h1>Hey looks like your not signed in! if you want to make a post you can sign in <a href='signin.php'>here</a> or make a account <a href='signup.php'>here</a></h1>";
        }
    ?>


    
    
    <hr class="subforum-divider">
    <?php
    
    $query = "SELECT * FROM threads where forum_id='$forum'";   
    $result = mysqli_query($conn, $query);
    $query = "SELECT * FROM threads where forum_id='$forum' ORDER BY id DESC ;"; 
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows(result: $result);
    if($rows - (($page - 1)*10) > 10){
        $rows = 10;
    }
    for ($y = 1; $y <= ($page - 1)*10; $y++){
        $thread = mysqli_fetch_row(result: $result);
    }
    $thread = mysqli_fetch_row(result: $result);
    $query = "SELECT * FROM replies where thread_id='$thread[0]';"; 
    $result = mysqli_query($conn, $query);
    $replys = mysqli_num_rows(result: $result);
    $query = "SELECT * FROM threads where forum_id='$forum' ORDER BY id DESC;"; 
    $result = mysqli_query($conn, $query);
    
    for ($x = 1 + (($page - 1)*10); $x <= $rows; $x++) {

        $thread = mysqli_fetch_row(result: $result);
        
        echo "
         <div class='container'>
        <div class='posts-table'>
            <div class='table-head'>
                <div class='image'>Visual</div>
                <div class='subjects'>Subjects</div>
                <div class='replies'>Replies</div>
                <div class='last-reply'>Last Reply</div>
            </div>
        </div>  
        <div class='table-row'>
            <div class='image'>
                <img src='DBImages/$thread[4]' onerror='this.onerror=null; this.src='Default.jpg'' alt=''>
            </div>
            <div class='subjects'>
                <a href='thread.php?thread=$thread[0]&page=1'>$thread[5]</a>
                <br>
                $thread[6]
            </div>
            <div class='replies'>
                <span>Replies:$replys</span> 
            </div>
            <div class='last-reply'>
                <span>Original Poster(OP):<a href='account.php?account=$thread[7]'><b>$thread[3]</b></a> </span>
                <br>
                <span> Time posted: <b>$thread[2]</b></span>
            </div>
        </div>
    </div>
    <hr class='subforum-divider'>
        ";
        
    }
    ?>
    
    <div class="pagination">
        Pages: <a href="threads.php?forum=<?php echo $forum?>&page=<?php echo $page - 1 ?>"><</a>
        <a href="threads.php?forum=<?php echo $forum?>&page=<?php echo $page ?>"><?php echo $page?></a>
        <a href="threads.php?forum=<?php echo $forum?>&page=<?php echo $page + 1 ?>"><?php echo $page+1?></a>
        <a href="threads.php?forum=<?php echo $forum?>&page=<?php echo $page + 2 ?>"><?php echo $page+2?></a>
        <a href="threads.php?forum=<?php echo $forum?>&page=<?php echo $page + 1 ?>">></a>
    </div>
    <script src="main.js"></script>

</body>
</html>
