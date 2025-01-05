<?php 
        session_start();    
        error_reporting(error_level: 0);

		include "connect.php";
		
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

        $page = $_GET['page'];


        $perm = 0;
        
        if($_SESSION["MODER"] == 1){
            $perm = 1;
        }
        if($_SESSION["ADMIN"] == 1){
            $perm = 2;
        }
        if($_SESSION["OWNER"] == 1){
            $perm = 3;
        }
        $link = "";
        include "header.php";
        $thread = $_GET["thread"];
        $text = $_POST["thread-text"];
        $text = str_replace("'", "''", $text);
        $name = $_SESSION["DISPLAY_NAME"] . $nameex;
        $rawname = $_SESSION["DISPLAY_NAME"];

        $image = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'DBImages/'.$image;
        
        //$image = mysqli_real_escape_string($conn,file_get_contents(isset($_FILES["file_image"]["tmp_name"]), true));
        if(isset($_POST['btnThread'])){
            $query = "INSERT INTO replies (id, thread_id, date_posted, reply_image, content, display_name, reply_link, rawname) VALUES (NULL, '$thread', current_timestamp(), '$image', '$text', '$name','$link', '$rawname');";
            mysqli_query($conn, $query);

            if(move_uploaded_file($tempname, $folder)){
                
            }
            else{
                
            }
        }
        

        $query = "SELECT * FROM threads where id='$thread'";   
        $result = mysqli_query($conn, $query);
        $thread_data = mysqli_fetch_row(result: $result);
        $query = "SELECT * FROM replies where thread_id='$thread' ORDER BY id Asc;"; 
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
    <br>
    <div class="navigate" id="mkpost">
        <span><a href="index.php">Home</a> > <a href="threads.php?forum=<?php echo $thread_data[1]?>&page=1">Forums</a> > <a href="#">Thread</a></span>
    </div>
    <br>
    <?php 
    
    if($_SESSION["DISPLAY_NAME"] != ""){   
        echo "
        <form method='post' id='mkpost' enctype='multipart/form-data'>
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
                <div class='text'>
                    <textarea name='thread-text' cols='10' rows='5' required></textarea></textarea>
                </div>

            </div>

        </div>
    </div>
    </form>
        ";
    }
    ?>
    
    <?php 
        
        
    ?>
    <div class="post">
        <div class="image">
            <img src="DBImages/<?php echo "$thread_data[4]"?>" onerror='this.onerror=null; this.src='Default.jpg'' alt=''>
        </div>
        <div class="message">
        Time Posted: <?php echo $thread_data[2]?> by <a href="account.php?account=<?php echo $thread_data[7]?>"><?php echo $thread_data[3]?></></a>
            <div class="title"><?php echo $thread_data[5]?></div>
            
            <?php echo "$thread_data[6]"?>
        </div>
        
    
    </div>
    
    <?php
    if(isset($_POST['btnKillThread'])){
        
        $query = "SELECT * FROM replies WHERE thread_id = $thread";
        
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows(result: $result);
        for($i = 0; $i < $num; $i++){
            $repl = mysqli_fetch_row(result: $result);
            $query = "DELETE FROM replies WHERE thread_id = $thread";
            mysqli_query($conn, $query);
        }

        $query = "DELETE FROM  threads  WHERE  threads . id = $thread";
        $result = mysqli_query($conn, $query);
        
    }
    

    if ($perm > 0){
        echo "<form method='post'><input type='submit' value='Kill Thread' name='btnKillThread'></form>";  
    }
    
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows(result: $result);
    if($rows - (($page - 1)*10) > 10){
        $rows = 10;
    }
    for ($y = 1; $y <= ($page - 1)*10; $y++){
        $reply = mysqli_fetch_row(result: $result);
    }
    $reply = mysqli_fetch_row(result: $result);
    for ($x = 1 + (($page - 1)*10); $x <= $rows; $x++) {

        
        echo "
            <div class='post'>
        <div class='image'>
            <img src='DBImages/$reply[3]' onerror='this.onerror=null; this.src='Default.jpg'' alt=''>
        </div>
        <div class='message'>
        Time Posted: $reply[2] by <a href='account.php?account=$reply[7]'>$reply[5]</a>
            <br>
            $reply[4]
	    <br>
        </div>
        </div>
        ";
        $reply = mysqli_fetch_row(result: $result);
    }
    ?>

    <div class="pagination">
        Pages: <a href="threads.php?forum=<?php echo $thread?>&page=<?php echo $page - 1 ?>"><</a>
        <a href="thread.php?thread=<?php echo $thread?>&page=<?php echo $page ?>"><?php echo $page?></a>
        <a href="thread.php?thread=<?php echo $thread?>&page=<?php echo $page + 1 ?>"><?php echo $page+1?></a>
        <a href="thread.php?thread=<?php echo $thread?>&page=<?php echo $page + 2 ?>"><?php echo $page+2?></a>
        <a href="thread.php?thread=<?php echo $thread?>&page=<?php echo $page + 1 ?>">></a>
    </div>


    <script src="main.js"></script>

</body>
</html>
