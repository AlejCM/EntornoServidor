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
            $temp_precio = depurar($_POST["precio"]);
            if (!strlen($temp_precio) > 0){
                $err_precio = "No hemos introducido nada";
            } else{
                if (!filter_var($temp_precio, FILTER_VALIDATE_INT) && $temp_precio != 0){
                    $err_precio = "Debes introducir un numero";
                } else{
                    $temp_precio = (int) $temp_precio;
                    if ($temp_precio < 0){
                        $err_precio = "Debes introducir un numero mayor o igual a 0";
                    } else{
                        $precio = $temp_precio;
                    }
                }     
            }
        }
    ?>
    <form action="" method="POST">
        <label>Precio</label><br>
        <input type="text" name="precio" step="0.01"><br>
        <?php 
            if (isset($err_precio)){ 
                echo "$err_precio<br>";
            } else{
                echo "<br>";
            }
        ?>
        <label>Iva</label><br>
        <select id="cantIva" name="iva">
            <option value="GENERAL">GENERAL</option>
            <option value="REDUCIDO">REDUCIDO</option>
            <option value="SUPERREDUCIDO">SUPERREDUCIDO</option>
            <option value="SIN IVA">SIN IVA</option>
        </select><br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php 
        if (isset($precio)){
        echo ("El precio sin Iva es: " . precioSinIva($precio, $_POST["iva"]) . "<br>");
        echo ("El precio con Iva es: " . precioConIva($precio, $_POST["iva"]) . "<br>");
        }
        function precioSinIva(float|int $precio, string $iva) : float{
            $porcIva = match($iva){
                "GENERAL"=>0.79,
                "REDUCIDO"=>0.90,
                "SUPERREDUCIDO"=>0.96,
                "SIN IVA"=>1
            };
            return ($precio * ($porcIva));
        }
        
        function precioConIva(float|int $precio, string $iva) : float{
            $porcIva = match($iva){
                "GENERAL"=>1.21,
                "REDUCIDO"=>1.10,
                "SUPERREDUCIDO"=>1.04,
                "SIN IVA"=>1
            };
            return ($precio * ($porcIva));
        }

    ?>
</body>
</html>