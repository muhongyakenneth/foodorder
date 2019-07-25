<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: blog.php");
exit(); }elseif(!isset($_SESSION["password"])){
header("Location: blog.php");
exit(); 	
}
?>
