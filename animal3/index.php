<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_form_password.css">
    <script defer src="js/index.js"></script>
</head>
<body>
<header>
<div class="header-main">    

<h1 class="h1">Дрип чип</h1>
    <a href="check_auth.php">
    <svg class="svg1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
    </a>
    <!-- <button id="button" class="buttonStatic">
        <a href="exit.php">выйти из аккаунта</a>
    </button> -->
    <div><?php 
    session_start();
    require_once ("config.php");
    $connect = mysqli_connect($host, $user, $password, $db);
    if(!$connect) {
    die();}
    
    if (empty($_SESSION["id"])) {
     echo "пользователь не авторизирован";}
    else {
        $userId=$_SESSION["id"];
        
    // echo $userId;
    $queryResult= mysqli_query($connect,"SELECT `Name`,`Surname` FROM `_user` WHERE `ID`= '$userId';");
    $queryResultToArray= mysqli_fetch_array($queryResult,MYSQLI_ASSOC);
    $Name=$queryResultToArray['Name'];
    $Surname=$queryResultToArray['Surname'];
    echo $Name;
    echo " ",$Surname;
    echo "<button id='button' class='buttonStatic'>
    <a href='exit.php'>выйти из аккаунта</a>
    </button>";
}
    ?></div>
</div>

</header>
<main>

</main>
<footer>

</footer>
</body>
</html>