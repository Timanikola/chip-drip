<?php
session_start();
$mail = $_POST["mail"]; //Глобальный массив со всеми параметрами сервера (Берется с name)
$pas = $_POST["password"];

require_once ("config.php");
 $connect = mysqli_connect($host, $user, $password, $db);
 if(!$connect) {
 die();
 }

 $queryResult= mysqli_query($connect,"SELECT * FROM `_user` WHERE `Email`= '$mail';");
    // if (empty($mail)||empty($pas)) {
    // echo("вы ничего не ввели");
    // }
    // else {
    //это позволяет убрать варнинги, проверяет почту на существование
    if($queryResultToArray= mysqli_fetch_array($queryResult,MYSQLI_ASSOC)){
        $row=$queryResultToArray["Email"];        
    }
    else{
        $row="";        
    }
   
    if ($row !=$mail) {
        echo "логин неправильный";
        // break;
    }
    else {
        //просто запрос в базу, он НАЙДЕТ ПОЛЬЗОВАТЕЛЯ У КОТОРОГО БУДЕТ ТАКОЙ ЛОГИН И ПАРОЛЬ КАК В ФОРМЕ
        $queryResult= mysqli_query($connect,"SELECT * FROM `_user` WHERE `Email`= '$mail' AND `Pass`= md5('$pas');");

        //это позволяет убрать варнинги, проверяет пароль на существование
        if($queryResultToArray= mysqli_fetch_array($queryResult,MYSQLI_ASSOC)){
            $row1=$queryResultToArray["Pass"]; 
            
            echo "авторизация прошла успешно";
            echo "<br>";
            $_SESSION["id"]=$queryResultToArray["ID"];
            header("Location: form_page.php");
        }else{
            $row1="";      
            print_r("пароль неправильный");  
        }
    }
//}
    ?>
    

    
    
   


    