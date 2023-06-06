<?php
session_start();
$mail=$_POST["mail"];
$pas=$_POST["password"];
$pas1=$_POST["password1"];
$name=$_POST["name"];
$surname=$_POST["surname"];
$patronymic=$_POST["patronymic"];
$birthday=$_POST["birthday"];
$nickname=$_POST["nickname"];

require_once ("config.php");
 $connect = mysqli_connect($host, $user, $password, $db);
 if(!$connect) {
 die();
 }
// echo $mail,"<br>";
// echo $pas,"<br>";
// echo $pas1,"<br>";

$queryResult= mysqli_query($connect,"SELECT `Email` FROM `_user`;");

$queryResultToArray= mysqli_fetch_all($queryResult,MYSQLI_ASSOC);
// print_r($queryResultToArray);
// echo '<br>';
// print_r($mail);



$check=false;
foreach ($queryResultToArray as $value) 
{
    // echo $value['Email'];   
    if ($mail == $value['Email']) {
        echo '<br>';
        echo"этот мейл уже занят";
        $check=true;
        break;
        
    }
    else {

        if ($pas != $pas1) {
            $check=true;
            echo "пароли не одинаковы, попробуйте еще раз";
            break;
        }
        
    }

}
if(!$check) {
    echo '<br>';
    echo "вы зарегестрированны";
    mysqli_query($connect,"INSERT INTO `_user` (`ID`, `Email`, `Surname`, `Name`, `Patronymic`, `Birthday`, `About`, `User_name`, `Pass`) VALUES (NULL, '$mail','$name', '$surname', '$patronymic', '$birthday', NULL, '$nickname', md5('$pas'));");
    
    // echo '<br>','<a href="index.php">вернуться назад</a>';
    
    $checkId= mysqli_query($connect,"SELECT `ID` FROM `_user` WHERE `Email`= '$mail';");

    $checkIdToArray= mysqli_fetch_array($checkId,MYSQLI_ASSOC);

    print_r($checkIdToArray);

    $userId=$checkIdToArray['ID'];

    $_SESSION["id"]=$userId;

    header("Location: index.php");
}
// else {
//     echo '<br>';
//     echo "вы зарегестрированны";
//     // mysqli_query($connect,"INSERT INTO `_user` (`ID`, `Email`, `Surname`, `Name`, `Patronymic`, `Birthday`, `About`, `User_name`, `Pass`) VALUES (NULL, '$mail','$name', '$surname', '$patronymic', '$birthday', NULL, NULL, '$pas');");
//     echo '<br>','<a href="index.php">вернуться назад</a>';   
// }







 