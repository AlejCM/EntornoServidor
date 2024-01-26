<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            $id = $_GET["id"];
            
            $apiUrl = "https://api.jikan.moe/v4/anime/". $id ."/full";

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $array = json_decode($respuesta, true);

            $anime = $array['data'];
            $nombre = $anime['title'];
            $imagen = $anime['images']['jpg']['large_image_url'];
            $sinopsis = !is_null($anime['synopsis']) ? $anime['synopsis'] : 'No hay Sinopsis';

            ?>
                <h1><?php echo $nombre ?></h1>
                <img src="<?php echo $imagen ?>" alt="imagen">
                <p><?php echo $sinopsis ?></p>
            <?php
            
        }





    ?>
</body>
</html>