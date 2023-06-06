<?php
session_start();
// $id_animal=$_SESSION["id_animal"];
// require_once('my_animal.php');
// session_start();
// $userId=$_SESSION["id"];
 $id_animal=$_POST["id_animal"];


// echo($id_animal);

require_once ("config.php");
$connect = mysqli_connect($host, $user, $password, $db);
if(!$connect) {
die();
}

mysqli_query($connect,"DELETE FROM `animals` WHERE `animals`.`id_animal` = '$id_animal';");

mysqli_query($connect,"DELETE FROM `location_animal` WHERE `location_animal`.`id` = '$id_animal';");

header("Location: my_animal.php");

