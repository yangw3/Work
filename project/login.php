<?php

include_once("./phpcas/CAS-1.4.0/CAS.php");
include('connect.php');
phpCAS::client(CAS_VERSION_2_0, 'cas.auth.rpi.edu', 443, '/cas');

// This is not recommended in the real world!
// But we don't have the apparatus to install our own certs...
phpCAS::setNoCasServerValidation();

if (!phpCAS::isAuthenticated()) {
  phpCAS::forceAuthentication();
  // The user has logged in, start a session before redirection
  // Misha's modifications for using sessions
  session_start();
  $_SESSION['userid'] = phpCAS::getUser();
  $_SESSION['blogid'] = NULL;
  // End of Misha's modifications
} else {
  header('Location: ./mainpage.php');
  $rcsid = phpCAS::getUser();

  //copy this because if users still exist then users would still have to store session data
  session_start();
  $_SESSION['userid'] = $rcsid;
  $_SESSION['blogid'] = NULL;
  $_SESSION['page'] = NULL;


  $query = $db->prepare("SELECT rcsid FROM users WHERE rcsid='" . $rcsid . "';");
  $query->execute();
  $results = $query->fetchAll();
  if (count($results) == 0) {
    $stmt = $db->prepare("INSERT INTO `users` (`rcsid`) VALUES ('" . $rcsid . "');");
    $stmt->execute();
  }
}
$db->null;
?>