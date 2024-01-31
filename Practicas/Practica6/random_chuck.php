<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Chuck Norris</title>
</head>
<body>
    <?php
        $apiUrl = "https://api.chucknorris.io/jokes/categories";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $categorias = json_decode($respuesta, true);
    ?>
    <form action="" method="POST">
        <label>Categoria: </label>
        <select name="categoria" id="categoria">
            <option value="" selected>Indiferente</option>
            <?php
                foreach($categorias as $categoria){
                    ?>
                        <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                    <?php
                }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $cat = $_POST["categoria"];

            if (isset($cat) && $cat != ""){
                $category = "category=$cat";

                $apiUrl = "https://api.chucknorris.io/jokes/random?$category";
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $apiUrl);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                curl_close($curl);

                $array = json_decode($respuesta, true);
                $chiste = $array['value'];
                ?>
                    <h2><?php echo $chiste ?></h2>
                <?php
            } else{
                $apiUrl = "https://api.chucknorris.io/jokes/random";
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $apiUrl);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                curl_close($curl);

                $array = json_decode($respuesta, true);
                $chiste = $array['value'];
                ?>
                    <h2><?php echo $chiste ?></h2>
                <?php
            }

        }
    ?>
</body>
</html>