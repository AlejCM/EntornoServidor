<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">Nombre</label><br>
        <input type="text" name="nombre"><br><br>
        <label for="">Apellidos</label><br>
        <input type="text" name="apellidos"><br><br>
        <label for="">Edad</label><br>
        <input type="number" name="edad"><br><br>
        <label for="">Suma</label><br>
        <input type="number" name="num1"> + <input type="number" name="num2"><br><br>
        <label for="">Mayor Menor o igual</label><br>
        <input type="number" name="mmi1"> + <input type="number" name="mmi2"><br><br>
        <label for="">Mayor de 3</label><br>
        <input type="number" name="may1"> + <input type="number" name="may2"> + <input type="number" name="may3"><br><br>
        <input type="submit" value="Enviar">
    </form>


    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellidos"];
            $edad = (int) $_POST["edad"];
            $suma = (int) $_POST["num1"] + (int) $_POST["num2"];
            echo "<h2>$suma</h2>";
            $mmi1 = (int) $_POST["mmi1"];
            $mmi2 = (int) $_POST["mmi2"];
            if ($mmi1 > $mmi2){
                echo "<h2>$mmi1 es mayor que $mmi2</h2>";
            }else if ($mmi1 < $mmi2){
                echo "<h2>$mmi1 es menor que $mmi2</h2>";
            }else{
                echo "<h2>$mmi1 es igual que $mmi2</h2>";
            }
            $may1 = (int) $_POST["may1"];
            $may2 = (int) $_POST["may2"];
            $may3 = (int) $_POST["may3"];
            if ($may1 == $may2 && $may1 == $may3){
                echo "<h2>Son iguales</h2>";
            }
            else{
                $mayor = $may1;
                if ($mayor < $may2){
                    $mayor = $may2;
                }
                if ($mayor < $may3){
                    $mayor = $may3;
                }
                echo "<h2>El mayor es $mayor</h2>";
            }
        }



    ?>
</body>
</html>