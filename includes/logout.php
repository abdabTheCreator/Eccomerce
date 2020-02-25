<?php
include 'header.inc.php';
include 'config.inc.php';
include 'mysql.inc.php';
redirect_invalid_user();
$_SESSION = array();
session_destroy();
setcookie(session_name(), '', time()- 3000);
$page_title = 'Logout';
echo '<h1 class="alert alert_success"> Logged out succesfully </h1>';
header('Location: ../index.php');
?>