<?php
    try {
        $dbhost = 'localhost';
        $dbname = 'termProject';
        $dbuser = 'phpmyadmin';
        $dbpass = '123wendymishakazuki';
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage() . "<br/>";
        die();
    }
?>