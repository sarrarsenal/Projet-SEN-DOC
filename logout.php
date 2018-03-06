<?php session_start();
if(isset($_SESSION)){
$login_kill=htmlentities($_SESSION['login']);
session_destroy();
header('location:index.php');}
?>
