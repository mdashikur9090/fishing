<?php 
session_start();
unset($_SESSION["role"]);
$_SESSION["isLogedIn"]==false;
session_destroy();
header("location:login.php");
echo("dfd");
?>