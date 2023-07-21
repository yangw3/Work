<?php
    // include ("connect.php");
    try{
        $dbhost = 'localhost';
        $dbname = 'termProject';
        $dbuser = 'phpmyadmin';
        $dbpass = '123wendymishakazuki';
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $postid = htmlspecialchars(trim($_POST['hiddenPostId']));

        echo "<script>alert(" . $postid . ")</script>";

        $stmt = $db->prepare("DELETE FROM `posts` WHERE `postId` ='" . $postid . "'");
        $stmt->execute();

        header('Location: ./mainpage.php');
    } catch (PDOException $e){
        echo ("Error : " . $e->getMessage() . "<br/>");
        die();
    }
?>