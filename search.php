<?php
session_start();    

error_reporting(error_level: 0);

$servername = "localhost";
$username = "root";
$password = "";
$en_postsdb = "enpostsdb";
$conn = "";
$forum = $_GET['search'];
$page = $_GET['page'];
// Create connection
$conn = new mysqli($servername, $username, $password, $en_postsdb);

// Check connection
if ($conn->connect_error) {
    echo "Did not connected successfully";
}
    echo "Connected successfully";

if ($forum == "english") {
    echo "English";
}
?>
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
    <?php 
    include "header.php";
    ?>
    <br>
    <div class="navigate">
        <span><a href="#">Home - Forums</a> >> <a href="#">General</a></span>
    </div>
    <br>

    <?php
        //error_reporting(error_level: 0);
        $title = $_POST["title"];
        $text = $_POST["thread-text"];
        $name = $_SESSION["DISPLAY_NAME"];
        $image = $_POST["file_image"];
        
        //$image = mysqli_real_escape_string($conn,file_get_contents(isset($_FILES["file_image"]["tmp_name"]), true));
        if(isset($_POST['btnThread'])){
            $query = "INSERT INTO threads (id, forum_id, date_posted, name, thread_image, title, content) VALUES (NULL, '$forum', current_timestamp(), '$name', '$image',  '$title', '$text');";
            mysqli_query($conn, $query);
        }
    ?>_
    <form method="post">
        <input type="submit" value="Post" name="btnThread">
        <div class="posts-container">
        <div class="posts-table">
            <div class="table-head">
                <div class="image">Visual</div>
                <div class="subjects">Subjects</div>
            </div>
        </div>  
        <div class="table-row">
            <div class="image">
                <input name="file_image" type="file" accept="image/*" id="file" onchange="loadFile(event)">
                <p><img id="output" width="200" /></p>
                <script type="text/javascript">
                    const uploadField = document.getElementById("file");
                    var loadFile = function(event) {    
                      var image = document.getElementById('output');
                      image.src = URL.createObjectURL(event.target.files[0]);
                    };
                </script>
            </div>
            <div class="subjects">
                <input type="text" id="thread-title" placeholder="Title" name="title" required>
                <br>
                <div class="text">
                    <textarea name="thread-text" cols="10" rows="5" required></textarea></textarea>
                </div>

            </div>

        </div>
    </div>
    </form>
    
    <hr class="subforum-divider">
    <?php
    $query = "SELECT * FROM threads where forum_id='$forum'";   
    $result = mysqli_query($conn, $query);
    $query = "SELECT * FROM threads where forum_id='$forum' ORDER BY id DESC;"; 
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows(result: $result);
    if($rows - (($page - 1)*10) > 10){
        $rows = 10;
    }
    for ($y = 1; $y <= ($page - 1)*10; $y++){
        $thread = mysqli_fetch_row(result: $result);
    }
    $thread = mysqli_fetch_row(result: $result);
    for ($x = 1 + (($page - 1)*10); $x <= $rows; $x++) {

        
        echo "
         <div class='container'>
        <div class='posts-table'>
            <div class='table-head'>
                <div class='image'>Visual</div>
                <div class='subjects'>Subjects</div>
                <div class='replies'>Replies/Views</div>
                <div class='last-reply'>Last Reply</div>
            </div>
        </div>  
        <div class='table-row'>
            <div class='image'>
                <img src='Images/vagita.png'>
            </div>
            <div class='subjects'>
                <a href='thread.php?thread=$thread[0]&page=1'>$thread[5]</a>
                <br>
                <span>Original Poster(OP): <b>$thread[3]</b> </span>
                <span> Time posted: <b>$thread[2]</b></span>
            </div>
            <div class='replies'>
                <span>Replies:2</span> 
                <br>
                <span>Views:12</span>
            </div>
            <div class='last-reply'>
                <span>by <b>exampleuser</b><br> 22 Dec 2021</span>
            </div>
        </div>
    </div>
    <hr class='subforum-divider'>
        ";
        $thread = mysqli_fetch_row(result: $result);
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