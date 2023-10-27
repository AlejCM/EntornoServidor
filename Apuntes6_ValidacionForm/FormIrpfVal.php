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
        <input type="submit" value="Enviar">
    </form>

    <?php
        function irpf(int $salario) : float{
            $salarioTotal = 0;
            if ($salario > 12450){
                $salarioTotal += 12450*0.81;
                if ($salario > 20200){
                    $salarioTotal += (20200-12450)*0.76;
                    if ($salario > 35200){
                        $salarioTotal += (35200-20200)*0.70;
                        if ($salario > 60000){
                            $salarioTotal += (60000-35200)*0.63;
                            if ($salario > 300000){
                                $salarioTotal += (300000-60000)*0.55;
                                return ((($salario - 300000) * 0.53) + $salarioTotal);
                            }
                            else{
                                return ((($salario - 60000) * 0.55) + $salarioTotal);
                            }
                        }
                        else{
                            return ((($salario - 35200) * 0.63) + $salarioTotal);
                        }
                    }
                    else{
                        return ((($salario - 20200) * 0.70) + $salarioTotal);
                    }
                }
                else{
                    return ((($salario - 12450) * 0.76) + $salarioTotal);
                }
            }
            else{
                return $salario * 0.81;
            }
        }

        if (isset($precio)){
            echo ("Tu salario final es: " . irpf($precio) . "<br>");
        }
    ?>
</body>
</html>