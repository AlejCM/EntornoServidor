<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function suma(int $num1, int $num2){
        return $num1+$num2;
    }
    function sumatiorio(int $num) : int{
        $suma = 0;
        for ($i = 1; $i <= $num; $i++){
            $suma += $i;
        }
        return $suma;
    }
    function factorial(int $num) : int{
        $res = 1;
        for ($i = 1; $i <= $num; $i++){
            $res *= $i;
        }
        return $res;
    }
    function minimo(array $num) : int{
        $res = $num[0];
        for ($i = 1; $i < count($num); $i++){
            if ($num[$i]<$res){
                $res = $num[$i];
            }
        }
        return $res;
    }
    function maximo(array $num) : int{
        $res = $num[0];
        for ($i = 1; $i < count($num); $i++){
            if ($num[$i]>$res){
                $res = $num[$i];
            }
        }
        return $res;
    }
    function media(array $num) : float{
        $res = 0.0;
        for ($i = 0; $i < count($num); $i++){
            $res += $i;
        }
        return $res/count($num);
    }
    function esPrimo(int $num) : bool{
        $bool = true;
        for ($i = 2; $i <= $num/2 && $bool; $i++){
            if ($num % $i == 0){
                $bool = false;
            }
        }
        return $bool;
    }
    function todosPrimos(int $num){
        for ($k = 2; $k < $num; $k++){
            $bool = true;
            for ($j = 2; $j <= $k/2 && $bool; $j++){
                if ($k % $j == 0){
                    $bool = false;
                }
            }
            if ($bool){
                echo "<li>$k</li>";
            }
        }
    }
    function potencia(int $base, int $exp) : int{
        $res = $base;
        for ($i = 2; $i <= $exp; $i++){
            $res *= $base;
        }
        return $res;
    }
    function precioSinIva(float|int $precio, float|int $iva) : float{
        $porcIva = match($iva){
            "GENERAL"=>0.79,
            "REDUCIDO"=>0.90,
            "SUPERREDUCIDO"=>0.96,
            "SIN IVA"=>1
        };
        return ($precio * ($porcIva));
    }
    function precioConIva(float|int $precio, float|int $iva) : float{
        $porcIva = match($iva){
            "GENERAL"=>1.21,
            "REDUCIDO"=>1.10,
            "SUPERREDUCIDO"=>1.04,
            "SIN IVA"=>1
        };
        return ($precio * ($porcIva));
    }
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
    $valor = 40000;
    echo "tu salario de $valor es en realidad: " . irpf($valor);
    ?>
</body>
</html>