<?php
session_start();
$name=$_POST["name"];
$gender=$_POST["gender"];
$lenth=$_POST["lenth"];
$height=$_POST["height"];
$type=$_POST["type"];
$latitude=$_POST["latitude"];
$longitude=$_POST["longitude"];
$id=$_SESSION["id"];

// $realTime=date('Y-m-d H:i:s', time()+ 60 *60 *3);
// echo $realTime;
require_once ("config.php");
 $connect = mysqli_connect($host, $user, $password, $db);
 if(!$connect) {
 die();
 }

//проверка на авторизацию, мало ли как неавторизированный пользователь попадет на страницу добавления животного, ну и у чипера должен быть айди 
if (empty($_SESSION["id"])) {
    echo "вы не авторизированны"; 
}
else{
    //отправляем в табличку с животными инфу о животном 
    mysqli_query($connect,"INSERT INTO `animals` (`id_animal`, `lenth`, `height`, `gender`, `lifeStatus`, `chipperId`, `chippingLocationId`, `chippingDateTime`, `deathDateTime`, `type_animal`, `name_animal`) VALUES (NULL, '$lenth', '$height', '$gender', '1', $id, NULL,current_timestamp(), NULL, '$type', '$name');"); 
    //послылаем а табличку запрос для того чтобы узнать какой айдишник сгенерировался последним 
    $queryResult= mysqli_query($connect,"SELECT `id_animal` FROM `animals` ORDER BY `id_animal` DESC LIMIT 1;");
    $queryResultToArray= mysqli_fetch_array($queryResult,MYSQLI_ASSOC);
    
    // echo($queryResultToArray["id_animal"]);

    //со спокойной душей записываем координаты животного 
    mysqli_query($connect,"INSERT INTO `location_animal` (`id`, `id_animal`, `visitedLocations`, `start_date`, `end_date`, `latitude`, `longitude`) VALUES (NULL, '$queryResultToArray[id_animal]', NULL, CURRENT_TIME(), NULL, '$latitude', '$longitude');"); 
    
    header("Location: add_animal.php");   
}



