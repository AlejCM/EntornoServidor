<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="GET">
        <label for="">Precio</label><br>
        <input type="number" name="precio" step="0.01"><br><br>
        <label for="">Iva</label><br>
        <select id="cantIva" name="iva">
            <option value="GENERAL">GENERAL</option>
            <option value="REDUCIDO">REDUCIDO</option>
            <option value="SUPERREDUCIDO">SUPERREDUCIDO</option>
            <option value="SIN IVA">SIN IVA</option>
        </select><br><br>
        <input type="hidden" name="f" value="iva">
        <input type="submit" value="Enviar">
        <br>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET"){
                if (isset($_GET["f"])){
                    if ($_GET["f"] == "iva"){
                        echo ("El precio sin Iva es: " . precioSinIva((int) $_GET["precio"], $_GET["iva"]) . "<br>");
                        echo ("El precio con Iva es: " . precioConIva((int) $_GET["precio"], $_GET["iva"]) . "<br>");
                    }
                }
            }
        ?>
    </form>
    <br><br>
    <form action="" method="GET">
        <label for="">Precio</label><br>
        <input type="number" name="precio" step="1000"><br><br>
        <input type="hidden" name="f" value="irpf">
        <input type="submit" value="Enviar">
        <br>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET"){
                if (isset($_GET["f"])){
                    if ($_GET["f"] == "irpf"){
                        echo ("Tu salario final es: " . irpf((int) $_GET["precio"]) . "<br>");
                    }
                }
            }
        ?>
    </form>
    <?php
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
    ?>
</body>
</html>