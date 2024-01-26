<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search anime</title>
</head>
<body>
    <form action="" method="POST">
        <label>Titulo</label>
        <input type="text" name="titulo">
        <select name="limite" id="limite">
            <option value="" selected>Todos</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select> <br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $titulo = trim($_POST["titulo"]);
            $limite = $_POST["limite"];
            $titulo = preg_replace('/\s+/', '+', $titulo);
            if ($limite == ""){
                $apiUrl = "https://api.jikan.moe/v4/anime?q=" . $titulo;
            } else{
                $apiUrl = "https://api.jikan.moe/v4/anime?q=" . $titulo . "&limit=" . $limite;
            }
            

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $array = json_decode($respuesta, true);

            $animes = $array['data'];
            foreach($animes as $anime){
                $id = $anime['mal_id'];
                $nombre = $anime['title'];
                $imagen = $anime['images']['jpg']['large_image_url'];
                $sinopsis = !is_null($anime['synopsis']) ? $anime['synopsis'] : 'No hay Sinopsis';

                ?>
                    <h1><?php echo $nombre ?></h1>
                    <a href="show_anime.php?id=<?php echo $id ?>"><img src="<?php echo $imagen ?>" alt="imagen"></a>
                    <p><?php echo $sinopsis ?></p>
                <?php
            }
            
        }

        

        


    ?>
    <button></button>
</body>
</html>