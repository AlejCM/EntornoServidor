<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        for ($i = 1; $i <= 10; $i++){
            echo "<table border = 1>";
            echo "<caption>Tabla del $i</caption>";
            echo "<tbody>";
            for ($j = 1; $j <= 10; $j++){
                echo "<tr><td>$i x $j = ". ($i*$j) . "</td></tr>";
            }
            echo "</tbody>";
            echo "</table><br>";
        }
    ?>
</body>
</html>