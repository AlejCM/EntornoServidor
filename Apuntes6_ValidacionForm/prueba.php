<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    function depurar(string $entrada) : string{
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $temp_campo1 = depurar($_POST["campo1"]);
            /*
            if (strlen($temp_campo1) > 0){
                if (is_numeric($temp_campo1)){
                    $temp_campo1 = (float) $temp_campo1;
                    if ($temp_campo1 >= 0){
                        echo $temp_campo1;
                    }
                    else{
                        $err_campo1 = "Debes introducir un numero mayor o igual a 0";
                    }
                }
                else{
                    $err_campo1 = "Debes introducir un numero";
                }
            }
            else{
                $err_campo1 = "No hemos introducido nada";
            }

            Mismo pero mas entendible en codigo 
            ------------------------------------------*/
            if (!strlen($temp_campo1) > 0){
                $err_campo1 = "No hemos introducido nada";
            } else{
                /* CIUDADO CON EL 0 Y LOS FILTROS QUE EL 0 ES FALSE EN UN IF */
                if (!filter_var($temp_campo1, FILTER_VALIDATE_INT) && $temp_campo1 != 0){
                    $err_campo1 = "Debes introducir un numero";
                } else{
                    $temp_campo1 = (int) $temp_campo1;
                    if ($temp_campo1 < 0){
                        $err_campo1 = "Debes introducir un numero mayor o igual a 0";
                    } else{
                        $campo1 = $temp_campo1;
                    }
                }     
            }
        }



    ?>
    <form action="" method="post">
        <label>Campo 1: </label>
        <input type="text" name="campo1"><br><br>
        <?php if (isset($err_campo1)) echo $err_campo1?>
        <input type="submit" value="Enviar">
    </form>
    <?php if (isset($campo1)) echo "<h3>$campo1</h3>"?>

    <!-- Validar mayores de tres numeros para que acepte cualquier numero entero de -100 a 100 -->
    
</body>
</html>