<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas de Trivial</title>
</head>
<body>
    <form action="" method="POST">
        <label>Cantidad de Preguntas: </label>
        <input type="text" name="cantidad" value="10">
        <br><br>

        <label>Categoria: </label>
        <select name="categoria" id="categoria">
            <option value="" selected>Indiferente</option>
            <option value="23">Historia</option>
            <option value="22">Geografia</option>
            <option value="27">Animales</option>
            <option value="15">Videojuegos</option>
        </select>
        <br><br>

        <label>Dificultad: </label>
        <select name="dificultad" id="dificultad">
            <option value="" selected>Indiferente</option>
            <option value="easy">Facil</option>
            <option value="medium">Media</option>
            <option value="hard">Dificil</option>
        </select> <br><br>
        
        <input type="submit" value="Enviar">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $cantidad = trim($_POST["cantidad"]);
            $categoria = $_POST["categoria"];
            $dificultad = $_POST["dificultad"];
            
            $amount = "amount=$cantidad";
            $category = "category=$categoria";
            $difficulty = "difficulty=$dificultad";
            
            $apiUrl = "https://opentdb.com/api.php?$amount&$category&$difficulty";           
            
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $array = json_decode($respuesta, true);
            $preguntas = $array['results'];

            ?>
                <ul>
            <?php
            foreach($preguntas as $pregunta){
                $question = $pregunta['question'];
                $dif = $pregunta['difficulty'];
                $cat = $pregunta['category'];
                $res = $pregunta['correct_answer'];
                $incorrectas = $pregunta['incorrect_answers'];
                ?>  
                    <li>
                        <h2><?php echo $question ?></h2>
                        <p>Categoria: <?php echo $cat ?></p>
                        <p>Dificultad: <?php echo $dif ?></p>
                        <ul>
                            <li style="color: green;"><?php echo $res ?></li>
                            <?php
                            foreach($incorrectas as $incorrecta){
                                ?>
                                    <li style="color: red"><?php echo $incorrecta ?></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                <?php
            }
            ?>
                </ul>
            <?php
        }
    ?>
</body>
</html>