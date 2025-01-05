<?php

/*
TODO:
31 currently

*/


error_reporting(error_level: 0);
session_start();    


$forum = "0";
$page = "0";

// Create connection
include "connect.php";
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
</head>
<body if="top">
    <?php 
    include "header.php";
    ?>  
    <center>
    <h1>Welcome To Ted's Forums</h1>
    <h1>Ted's Forums is a site with the purpose of providing a place where anybody from anywhere can talk with one another</h1>
    <h1>First lets get started on going on one of the <a href="#langforum">language forums</a> or on of the <a href="#topicforum">topic forums</a></h1>
    </center>
    <h1 id="langforum">Go to <a href="#topicforum">topic forums</a></h1> 
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>General Language Forums</h1>
            </div>
            
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=0 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=0&page=1"><img src="Images/english.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=0&page=1" >English</a> </h1>
                    <p>Content: General forum for english speaking users</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=1 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=1&page=1"><img src="Images/spain.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=1&page=1">Español</a> </h1>
                    <p>Contenido: Foro general para usuarios de habla hispana.</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=3 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=3&page=1"><img src="Images/france.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=3&page=1">Français</a> </h1>
                    <p>
                        Contenu: Formulaire général pour les utilisateurs francophones</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=4 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=4&page=1"><img src="Images/china.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=4&page=1">中国人</a> </h1>
                    <p>内容：普通话用户通用论坛</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=5 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=5&page=1"><img src="Images/arabic.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=5&page=1">عربي</a> </h1>
                    <p>المحتوى: منتدى عام للمستخدمين الناطقين باللغة العربية</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=6 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=6&page=1"><img src="Images/korea.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=6&page=1">한국인</a> </h1>
                    <p>내용: 한국어 사용자를 위한 일반 포럼</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=7 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=7&page=1"><img src="Images/russia.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=7&page=1">русский</a> </h1>
                    <p>Содержание: Общий форум для русскоязычных пользователей</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=8 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=8&page=1"><img src="Images/japan.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=8&page=1">日本語</a> </h1>
                    <p>内容: 日本語を話すユーザー向けの総合フォーラム</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=17 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=17&page=1"><img src="Images/bulgaria.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=17&page=1">български</a> </h1>
                    <p>Съдържание: Общ форум за българоговорящи потребители</p>    
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=18 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=18&page=1"><img src="Images/india.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=18&page=1">हिंदी</a> </h1>
                    <p>सामग्री: हिंदी भाषी उपयोगकर्ताओं के लिए सामान्य प्रपत्र</p>    
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=19 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=19&page=1"><img src="Images/urdu.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=19&page=1">اردو</a> </h1>
                    <p>مواد: اردو بولنے والے صارفین کے لیے عمومی شکل</p>    
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=20 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=20&page=1"><img src="Images/germany.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=20&page=1">Deutsch</a> </h1>
                    <p>Inhalt: Allgemeines Formular für deutschsprachige Benutzer</p>    
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=21 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=21&page=1"><img src="Images/phili.jpg"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=21&page=1">Tagalog</a> </h1>
                    <p>Nilalaman: Pangkalahatang anyo para sa mga gumagamit na nagsasalita ng tagalog</p>    
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=22 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=22&page=1"><img src="Images/portugal.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=22&page=1">Português</a> </h1>
                    <p>Conteúdo: Fórum geral para usuários de língua portuguesa</p>    
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=2 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=2&page=1"><img src="Images\turkish.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=2&page=1">Türkçe</a> </h1>
                    <p>İçerik: Türkçe konuşan kullanıcılar için genel forum</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=23 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=23&page=1"><img src="Images/poland.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=23&page=1" >Polski</a> </h1>
                    <p>Treść: Ogólne forum dla użytkowników mówiących po polsku</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
        </div>
    </div>
    <h1 id="topicforum">Go back to <a href="#langforum">language forums</a></h1>
    <div class="container">
        <div class="subforum">
            <div class="subforum-title" >
                <h1>Topics</h1>
            </div>
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=9 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=9&page=1"><img src="Images/cpp.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=9&page=1">Programming</a> </h1>
                    <p>Content: Help with coding questions/errors and discussion or just anything having to do with software</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=10 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=10&page=1"><img src="Images/download (1).png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=10&page=1">Sports</a> </h1>
                    <p>Content: Anything having to do with any kind of sport/game i.e Football</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=11 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=11&page=1"><img src="Images/download (2).jfif"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=11&page=1">Gaming</a> </h1>
                    <p>Content: Video game help and discussion</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=12 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=12&page=1"><img src="Images/download.jfif"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=12&page=1">Technology</a> </h1>
                    <p>Content: computers, robotics, hardware, linux, raspberry pi, etc...</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=13 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=13&page=1"><img src="Images/TPAB.jfif"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=13&page=1">Music</a> </h1>
                    <p>Content: Discussion about artists, songs, albums, etc...</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=14 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=14&page=1"><img src="Images/donut.jpg"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=14&page=1">Food</a> </h1>
                    <p>Content: Baking, cooking, or just anything having to do with food</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=15 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=15&page=1"><img src="Images/tv.jpg"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=15&page=1">TV</a> </h1>
                    <p>Content: TV shows and movies</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=16 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=16&page=1"><img src="Images/pepe.jpg"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=16&page=1">Memes</a> </h1>
                    <p>Content: Memes sharing and discussion</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=24 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=24&page=1"><img src="Images/school.jpg"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=24&page=1">School</a> </h1>
                    <p>Content: School help, discussion, or just sharing</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=25 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=25&page=1"><img src="Images/building.jpg"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=25&page=1">Construction</a> </h1>
                    <p>Content: Anything having to do with construction, building, or just wood/metal work</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=26 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=26&page=1"><img src="Images/newart.jpg"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=26&page=1">Art</a> </h1>
                    <p>Content: Art sharing and discussion</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=27 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=27&page=1"><img src="Images/plant.jpg"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=27&page=1">Plants</a> </h1>
                    <p>Content: Help with growing plants, sharing plants or just plant discussion</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=28 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=28&page=1"><img src="Images/philosophy.jpg"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=28&page=1">Philosophy</a> </h1>
                    <p>Content: Discussion of big topics/ideas/problems (so not for little things)</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=29 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=29&page=1"><img src="Images/books.jpg"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=29&page=1">Literature</a> </h1>
                    <p>Content: Book sharing and discussion</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=30 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=30&page=1"><img src="Images/DIY.jpg"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=30&page=1">DIY</a> </h1>
                    <p>Content: Sharing/tutorials on doing stuff a home or D.I.Y.(do it yourself)</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">
            <div class="subforum-row">
                <?php 
                $query = "SELECT * FROM threads where forum_id=31 ORDER BY id DESC";   
                $result = mysqli_query($conn, $query);
                $enPosts = mysqli_num_rows(result: $result); 
                $enThread = mysqli_fetch_row(result: $result);
                ?>
                <div class="subforum-icon subforum-column center">
                    <a href="threads.php?forum=31&page=1"><img src="Images/misc.png"></a>
                </div>
                <div class="subforum-describtion subforum-column">
                    <h1><a href="threads.php?forum=31&page=1">Other</a></h1>
                    <p>Content: General forum for unusual or irregular topics</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span><?php echo $enPosts ?> post(s)</span>
                </div> 
                <div class="subforum-info subforum-column">
                    <b><a href="thread.php?thread=<?php echo $enThread[0]?>&page=1">Last Post</a></b> by <a href="account.php?account=<?php echo $enThread[7]?>"><?php echo $enThread[3]?></a>
                    <br>
                    on <small><?php echo $enThread[2]?></small>
                </div>
            </div>
            <hr class="subforum-divider">   
        </div>
    </div>
    
    <center>
        <h1 ><a href="#top">Go back to top</a></h1>  
        <h1 ><a href="https://du0o.github.io/TedsPortfolio/" target="_blank">About Ted</a></h1>  
    </center>
  

    <script src="main.js"></script>

</body>
</html>
