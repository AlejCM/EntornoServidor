<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
</head>
<body>
    <?php
        $apiUrl = "http://localhost:8000/api/films";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $array = json_decode($respuesta, true);
        $peliculas = $array["data"];

        foreach($peliculas as $pelicula){
            $id = $pelicula["id"];
            $title = $pelicula["title"];
            $year = $pelicula["year"];
            $duration = $pelicula["duration"];
            ?>
                <a href="show_pelicula.php?id=<?php echo $id ?>"><h1><?php echo $title ?></h1></a>
                <h2><?php echo $year ?></h2>
                <h3><?php echo $duration ?></h3>
            <?php
        }
    ?>
    
</body>
</html>