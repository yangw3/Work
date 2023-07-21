<?php 
include('connect.php'); 
?>

<?php
    session_start();

    $rcsid = $_SESSION['userid'];
    $date = date("Y-m-d H:i:s");

    $postid = htmlspecialchars(trim( $_GET['postid']));
    $comment = htmlspecialchars(trim($_POST['comment']));


    $sql = "INSERT INTO comments VALUES (NULL, '$postid','$comment', '$date', '$rcsid')";
    $db->exec($sql);

    header('Location: ./'.$_SESSION['page']);
?>