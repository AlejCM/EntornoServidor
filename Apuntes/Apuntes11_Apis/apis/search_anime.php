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

        <label>Nota minima: </label>
        <select name="notaMin" id="notaMin">
            <option value="" selected hidden>Minimo</option>
            <?php for ($i = 1; $i <= 10; $i++){ ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php } ?>
        </select>
        <select name="notaMax" id="notaMax">
            <option value="" selected hidden>Maximo</option>
            <?php for ($i = 1; $i <= 10; $i++){ ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php } ?>
        </select>
        <select name="ordenar" id="ordenar">
            <option value="" selected>Sin Orden</option>
            <option value="titulo">Titulo</option>
            <option value="nota">Nota</option>
            <option value="tituloynota">Titulo y Nota</option>
        </select> <br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $titulo = trim($_POST["titulo"]);
            $limite = $_POST["limite"];
            $notaMin = $_POST["notaMin"];
            $notaMax = $_POST["notaMax"];
            $titulo = preg_replace('/\s+/', '+', $titulo);
            
            $q = "q=$titulo";
            $limit = "limit=$limite";
            $min_score = "min_score=$notaMin";
            $max_score = "max_score=$notaMax";

            $orden = $_POST["ordenar"];
            
            $apiUrl = "https://api.jikan.moe/v4/anime?$q&$limit&$min_score&$max_score";           
            
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $array = json_decode($respuesta, true);
            $animes = $array['data'];

            if (isset($orden) && $orden != ""){
                if ($orden == "titulo"){
                    $titulo_orden = array_column($animes, "title");
                    array_multisort($titulo_orden, SORT_ASC, $animes);
                } else if ($orden == "nota"){
                    $nota_orden = array_column($animes, "score");
                    array_multisort($nota_orden, SORT_DESC, $animes);
                } else{
                    $nota_orden = array_column($animes, "score");
                    $titulo_orden = array_column($animes, "title");
                    array_multisort($nota_orden, SORT_DESC, $titulo_orden, SORT_ASC, $animes);
                }
            }

            foreach($animes as $anime){
                $id = $anime['mal_id'];
                $nombre = $anime['title'];
                $imagen = $anime['images']['jpg']['large_image_url'];
                $score = $anime['score'];
                $sinopsis = !is_null($anime['synopsis']) ? $anime['synopsis'] : 'No hay Sinopsis';

                ?>
                    <h1><?php echo $nombre ?></h1>
                    <a href="show_anime.php?id=<?php echo $id ?>"><img src="<?php echo $imagen ?>" alt="imagen"></a>
                    <p><?php echo $score ?></p>
                    <p><?php echo $sinopsis ?></p>
                <?php
            }
            
        }
    ?>
</body>
</html>