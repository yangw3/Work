<?php 
include('connect.php'); 
?>
<?php
    session_start();
    $rcsid = $_SESSION['userid'];
    $postid = htmlspecialchars(trim($_GET['postid']));
    $reason = htmlspecialchars(trim($_POST['reason']));

    // checks for reports if there are more than 10 reports, delete the post and all its comments
    $sql = "INSERT INTO reports VALUES (NULL,'$postid', '$reason')";
    $db->exec($sql);

    $sql = $db->prepare('SELECT `postId` from `reports` WHERE postId = ' . $postid);
    $sql->execute();
    $output = $sql->fetchAll();
    if(count($output) > 10){
        $sql = "DELETE FROM comments WHERE postId = '$postid'";
        $db->exec($sql);

        $sql = "DELETE FROM reports WHERE postId = '$postid'";
        $db->exec($sql);

        $sql = "DELETE FROM posts WHERE postId = '$postid'";
        $db->exec($sql);

    }

    header('Location: ./'.$_SESSION['page']);

?>