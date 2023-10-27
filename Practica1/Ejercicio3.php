<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
        $listas = [];
        $pequenio = [];
        $grande = [];
        for ($i = 0; $i < 10; $i++){
            array_push($pequenio, rand(1,10));
            array_push($grande, rand(10,100));
        }
        array_push($listas, $pequenio);
        array_push($listas, $grande);
    ?>
    <br>
    <table class="tabla-bonita">
        <caption>Arrays Sin Ordenar</caption>
        <thead>
            <tr>
                <th>0-10</th>
                <th>10-100</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i = 0; $i < 10; $i++){
                    echo "<tr>";
                    echo "<td>" . $listas[0][$i] . "</td>";
                    echo "<td>" . $listas[1][$i] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <br><br>
    <?php
        $maximo = 0;
        $minimo = 10;
        $media = 0;
        for ($i = 0; $i < count($pequenio); $i++){
            if ($maximo < $pequenio[$i]){
                $maximo = $pequenio[$i];
            }
            if ($minimo > $pequenio[$i]){
                $minimo = $pequenio[$i];
            }
            $media += $pequenio[$i];
        }
        $media /= count($pequenio);
        echo "<h2>El minimo del array 0-10 es : $minimo</h2>";
        echo "<h2>El maximo del array 0-10 es : $maximo</h2>";
        echo "<h2>La media del array 0-10 es : $media</h2><br><br>";
        $maximo = 10;
        $minimo = 100;
        $media = 0;
        for ($i = 0; $i < count($grande); $i++){
            if ($maximo < $grande[$i]){
                $maximo = $grande[$i];
            }
            if ($minimo > $grande[$i]){
                $minimo = $grande[$i];
            }
            $media += $grande[$i];
        }
        $media /= count($grande);
        echo "<h2>El minimo del array 10-100 es : $minimo</h2>";
        echo "<h2>El maximo del array 10-100 es : $maximo</h2>";
        echo "<h2>La media del array 10-100 es : $media</h2>";
    ?>
</body>
</html>