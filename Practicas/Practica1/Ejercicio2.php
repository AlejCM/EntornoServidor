<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
        $temperaturas = [
            ["Málaga", 20, 27],
            ["Sevilla", 17, 36],
            ["Cádiz", 19, 31],
            ["Jaén", 19, 33],
            ["Granada", 12, 35],
            ["Almería", 20, 27],
            ["Huelva", 16, 33]
        ];
        for ($i = 0; $i < count($temperaturas); $i++){
            $temperaturas[$i][3] = ($temperaturas[$i][1] + $temperaturas[$i][2])/2;
        }    
        #ordenamos el array
        $ciudad = array_column($temperaturas, 0);
        $minima = array_column($temperaturas, 1);
        $maxima = array_column($temperaturas, 2);
        $media = array_column($temperaturas, 3);
        array_multisort($minima, SORT_ASC, $ciudad, SORT_ASC, $maxima, SORT_ASC, $media, SORT_ASC, $temperaturas);
    ?>
    <table class="tabla-bonita">
        <caption>Temperaturas</caption>
        <thead>
            <tr>
                <th>Ciudad</th>
                <th>Minima</th>
                <th>Maxima</th>
                <th>Media</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($temperaturas as $temperatura){
                    list($ciudad,$minima,$maxima,$media) = $temperatura;
                    echo "<tr>";
                    echo "<td>$ciudad" . "</td>";
                    echo "<td>$minima" . "</td>";
                    echo "<td>$maxima" . "</td>";
                    echo "<td>$media" . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <?php
        $min_media = 0;
        $max_media = 0;
        foreach($temperaturas as $temperatura){
            $min_media += $temperatura[1];
            $max_media += $temperatura[2];
        }
        echo "<h2>La media de las temperaturas minimas es: " . ($min_media/count($temperaturas)) . "</h2>";
        echo "<h2>La media de las temperaturas maximas es: " . ($max_media/count($temperaturas)) . "</h2>";
    ?>

</body>
</html>