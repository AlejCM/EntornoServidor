<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelicula</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            $id = $_GET["id"];
            
            $apiUrl = "http://localhost:8000/api/films/$id";

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $array = json_decode($respuesta, true);
            $pelicula = $array["data"];

            $id = $pelicula["id"];
            $title = $pelicula["title"];
            $year = $pelicula["year"];
            $duration = $pelicula["duration"];
            ?>
                <h1><?php echo $title ?></h1>
                <h2><?php echo $year ?></h2>
                <h3><?php echo $duration ?></h3>
            <?php
            
        }
    ?>
</body>
</html>