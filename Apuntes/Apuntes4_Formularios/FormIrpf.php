<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--  Otra manera de linkear un php
        <?php require 'rutarelativadelfichero' ?>-->
</head>
<body>
    <form action="" method="POST">
        <label for="">Precio</label><br>
        <input type="number" name="precio" step="0.01"><br><br>
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

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            echo ("Tu salario final es: " . irpf((int) $_POST["precio"]) . "<br>");
        }
    ?>
</body>
</html>