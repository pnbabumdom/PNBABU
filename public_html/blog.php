<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
//include("auth.php"); //include auth.php file on all secure pages 
?>