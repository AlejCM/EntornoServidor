<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasa</title>
</head>
<body>
    <?php
        $apiUrl = "https://api.nasa.gov/planetary/apod";
        $apiKey = "r1gtVoJbXwV03HUkvw4hW9YLcWEfx9tbHcYaOoGT";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, $apiKey . ":");
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $array = json_decode($respuesta, true);
        var_dump($array);

        $imagen = $array["hdurl"];
        $dia = $array["date"];
        $descripcion = $array["explanation"];
    ?>
    <img src="<?php echo $imagen ?>" alt="imagen">
    <p><?php echo $dia ?></p>
    <p><?php echo $descripcion ?></p>
</body>
</html>