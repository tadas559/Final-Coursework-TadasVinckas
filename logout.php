<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['name']);
unset($_SESSION['access']);
unset($_SESSION['loggedin']);
session_destroy();
setcookie("rememberme", '', time()-3600);
header("Location: login.php");
?>