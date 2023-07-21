<?php 
include('connect.php'); 
?>
<?php
        session_start();
        $rcsid = $_SESSION['userid'];
        $date = date("Y-m-d H:i:s");
        $body = htmlspecialchars(trim($_POST['Body']));
        $title = htmlspecialchars(trim($_POST['Title']));
        $rcsid = $_SESSION['userid'];
        $tag;
        if(!empty($_POST['check_list'])) {
            // Counting number of checked checkboxes.
            $checked_count = count($_POST['check_list']);
            // Loop to store and display values of individual checked checkbox.
            foreach($_POST['check_list'] as $selected) {
                $tag = $selected;
            }  
        }
        else{
            $tag = "none";
        }
    
        $sql ="INSERT INTO posts VALUES (NULL,'$body', '$title', '$date', '$tag','$rcsid')";
      
    
        $db->exec($sql);
    
        header('Location: ./'.$_SESSION['page']);

?>


