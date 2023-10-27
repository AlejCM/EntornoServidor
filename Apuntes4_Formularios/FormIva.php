<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">Precio</label><br>
        <input type="number" name="precio" step="0.01"><br><br>
        <label for="">Iva</label><br>
        <select id="cantIva" name="iva">
            <option value="GENERAL">GENERAL</option>
            <option value="REDUCIDO">REDUCIDO</option>
            <option value="SUPERREDUCIDO">SUPERREDUCIDO</option>
            <option value="SIN IVA">SIN IVA</option>
        </select><br><br>
        <input type="submit" value="Enviar">
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

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            echo ("El precio sin Iva es: " . precioSinIva((int) $_POST["precio"], $_POST["iva"]) . "<br>");
            echo ("El precio con Iva es: " . precioConIva((int) $_POST["precio"], $_POST["iva"]) . "<br>");
        }
    ?>
</body>
</html>