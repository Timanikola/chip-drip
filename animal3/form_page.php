<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/style_form_page.css">
    <link rel="stylesheet" href="css/style_form_password.css">
</head>
<body>
    <header>

    </header>
    <main>
        <section class="mainSection">

            <div class="linkButtons">
                <button class="custom-btn btn-14" onclick="document.location='index.php'">Назад</button>
                <button class="custom-btn btn-14" onclick="document.location='add_animal.php'">add animal</button>
                <button class="custom-btn btn-14" onclick="document.location='my_animal.php'">my animal</button>
                <button class="custom-btn btn-14" onclick="document.location='map.php'">map</button>                
            </div>




            <div class="divForm">
    <?php 
session_start();

// echo "привет";
// echo $_SESSION["id"];
require_once ("config.php");
 $connect = mysqli_connect($host, $user, $password, $db);
 if(!$connect) {
 die();
 }
    $id=$_SESSION["id"];
    $queryResult= mysqli_query($connect,"SELECT * FROM `_user` WHERE `ID`= '$id';");
    $queryResultToArray= mysqli_fetch_array($queryResult,MYSQLI_ASSOC);
    $userId=$_SESSION["id"];
    $editUserEmail=$queryResultToArray["Email"];
    $editUserName=$queryResultToArray["Name"];
    $editUserSurname=$queryResultToArray["Surname"];
    $editUserPatronymic=$queryResultToArray["Patronymic"];
    $editUserBirthday=$queryResultToArray["Birthday"];
    $editUserNickName=$queryResultToArray["User_name"];

?>

    <form action="setting_personal_account.php" method="post">
    <input type="hidden" name="id" value="<?=$id ?>">
    <input type="text" name="surname2" value="<?php echo $editUserSurname; ?>"><br>
    <input type="text" name="name2" value="<?php echo $editUserName; ?>"><br>
    <input type="text" name="patronymic2" value="<?php echo $editUserPatronymic; ?>"><br>
    <input type="date" name="birthday2" value="<?php echo $editUserBirthday?>"><br>
    <input type="text" name="nickname2" value="<?php echo $editUserNickName; ?>"><br>

    <!-- type="email" name="mail2" id="mail2" -->
    <label for="mail3"><?php echo $editUserEmail; ?></label><br>
    <input type="email" name="mail3" id="mail3" placeholder="Введите новую почту"> <br>
    
    
    <input type="submit" value="сохранить результат">
    </form>

    <?php 
    echo '<a href="remove_account.php">удалить аккаунт</a>','<br>','<br>';

    echo '<a href="index.php">вернуться на главную</a>';
    ?>  
            </div>
        </section>
    </main>
    <footer>

    </footer>
</body>
</html>



    