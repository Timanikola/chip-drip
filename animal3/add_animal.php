<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_add_animal.css">
    <title>добавьте свое животное</title>
</head>
<body>
    <main>
        <h1>добавьте свое животное</h1>
        <form action="end_add_animal.php" method="post">
            <label for="name">Имя</label><br>
        <input required type="text" name="name" placeholder="Имя"><br> 



    
            <p>Пол</p>
            <label for="g0">жен</label>
            <input type="radio" name="gender" id="g0" value="0" checked>
            <br>
            <label for="g1">муж</label>
            <input type="radio" name="gender" id="g1" value="1">
    

        <br>
        <br>
            <label for="lenth">Длинна</label><br>
        <input required type="text" name="lenth" placeholder="Длинна"><br>
        <br>
            <label for="">Высота</label><br>
        <input required type="text" name="height" placeholder="Высота"><br>
        <br>
            <label for="">Вид</label><br>
        <!-- <input required type="text" name="type" placeholder="Вид животного"><br> -->
        <select name="type" id="">
        <?php
            require_once ("config.php");
            $connect = mysqli_connect($host, $user, $password, $db);
            if(!$connect) {
            die();
            }
            
            $queryResult= mysqli_query($connect,"SELECT * FROM `types_animal`;");

            $queryResultToArray= mysqli_fetch_all($queryResult,MYSQLI_ASSOC);

            // print_r($queryResultToArray);

            foreach ($queryResultToArray as $key => $value) {
                echo "<option value='$value[typeId]'>$value[typeName]</option>";
            }
            ?>
         </select>
         <br>
         <br>
         <label for="latitude">Широта Х</label><br>
        <input required type="text" name="latitude" id="latitude" placeholder="Широта"><br>
         <br>
         <label for="longitude">Долгота У</label><br>
        <input required type="text" name="longitude" id="longitude" placeholder="Долгота"><br>
        <br>
        <input class="custom-btn btn-14" type="submit" value="добавить">
        </form>
        <br>
        <button class="custom-btn btn-14" onclick="document.location='check_auth.php'">Назад</button>
    </main>
   
</body>
</html>