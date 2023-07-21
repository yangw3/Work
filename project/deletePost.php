<?php 
include('connect.php'); 
?>
<?php
    session_start();

    $postID =  htmlspecialchars(trim($_GET['postId']));
   
    $sql = "DELETE FROM comments WHERE postId = '$postID'";
    $db->exec($sql);

    $sql = "DELETE FROM reports WHERE postId = '$postID'";
    $db->exec($sql);

    $sql = "DELETE FROM posts WHERE postId = '$postID'";
    $db->exec($sql);

   header('Location: ./'.$_SESSION['page']);


?>