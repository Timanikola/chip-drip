<?php 
session_start();
$name2=$_POST["name2"];
$surname2=$_POST["surname2"];
$patronymic2=$_POST["patronymic2"];
$birthday2=$_POST["birthday2"];
$nickname2=$_POST["nickname2"];
// $mail2=$_POST["mail2"];
//мы больше не меняем новую почту с помощью старой
$mailNew=$_POST["mail3"];
// echo $_SESSION["id"];
$userId=$_SESSION["id"];

require_once ("config.php");
 $connect = mysqli_connect($host, $user, $password, $db);
 if(!$connect) {
 die();
 }

 $check=false;
 $queryResult0= mysqli_query($connect,"SELECT * FROM `_user` WHERE `ID`= '$userId';");
 $queryResultToArray0= mysqli_fetch_array($queryResult0,MYSQLI_ASSOC);
 $mailOld=$queryResultToArray0['Email'];

 
 
 
 $queryResult= mysqli_query($connect,"SELECT `Email` FROM `_user`;");
 $queryResultToArray= mysqli_fetch_all($queryResult,MYSQLI_ASSOC);
if (empty($mailNew)) {
    $mailNew=$mailOld;
}
else {
    foreach ($queryResultToArray as $value) 
    {
        // echo $value['Email'];   
        if ($mailNew == $value['Email']) {
            echo '<br>';
            echo"этот мейл уже занят";
            $check=true;
            break;
            
        }
    } 
}
$queryResult2= mysqli_query($connect,"SELECT `Name`,`Surname`,`Patronymic`,`Birthday`,`User_name` FROM `_user` WHERE `ID`= '$userId';");
//этот запрос возвращает значения полям, которые не меняли 
 $queryResultToArray2= mysqli_fetch_array($queryResult2,MYSQLI_ASSOC);
 if (empty($name2)) {
    $name2=$queryResultToArray2["Name"];
}
if (empty($surname2)) {
    $surname2=$queryResultToArray2["Surname"];
}
if (empty($patronymic2)) {
    $surname2=$queryResultToArray2["Patronymic"];
}
if (empty($nickname2)) {
    $nickname2=$queryResultToArray2["User_name"];
}


 
 

if(!$check) {
    echo '<br>';
    echo "ваши изменения сохранены";
    mysqli_query($connect,"UPDATE `_user` SET `Email` = '$mailNew', `Surname` = '$surname2', `Name` = '$name2', `Patronymic` = '$patronymic2', `User_name` = '$nickname2' WHERE `_user`.`ID`='$userId';");
    echo '<br>','<a href="index.php">вернуться назад</a>';   
}
?>