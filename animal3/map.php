<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>map</title>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=aef21b1d-7068-4075-ac0f-f029fa8e8a8f&lang=ru_RU" type="text/javascript"></script>
    <script defer src="js/map.js"></script>
</head>
<body>
    <div id="map" style="width: 1920px; height: 1080px"></div>
    <?php  require_once ("config.php");
             $connect = mysqli_connect($host, $user, $password, $db);
             if(!$connect) {
             die();
             } 
             

             
             $queryLocationAnimal= mysqli_query($connect,"SELECT `latitude`, `longitude` FROM `location_animal` ;");
             $queryLocationAnimalToArray= mysqli_fetch_array($queryLocationAnimal,MYSQLI_ASSOC);

             $latitude=$queryLocationAnimalToArray["latitude"];
             $longitude=$queryLocationAnimalToArray["longitude"];

             ?>
   
</body>
</html>