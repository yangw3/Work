<?php
include_once("./phpcas/CAS-1.4.0/CAS.php");
phpCAS::client(CAS_VERSION_2_0,'cas.auth.rpi.edu',443,'/cas');

// This is not recommended in the real world!
// But we don't have the apparatus to install our own certs...
phpCAS::setNoCasServerValidation();

if (phpCAS::isAuthenticated()) {
  // End any session that was running
  // session_start();
  session_destroy();
  // End of Misha modification
  phpCAS::logout();
} else {
  header('Location: ./index.php');
}
?>