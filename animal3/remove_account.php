<?php
session_start();
$userId=$_SESSION["id"];

require_once ("config.php");
$connect = mysqli_connect($host, $user, $password, $db);
if(!$connect) {die();}

mysqli_query($connect,"DELETE FROM `_user` WHERE `_user`.`ID` = '$userId';");

$_SESSION = [];

header("Location: index.php");