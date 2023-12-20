<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $i = 1;
    while ($i <= 10){
        echo $i . " ";
        $i++;
    }
    echo "<br>";

    $i = 1;
    while ($i <= 10):
        echo $i++." ";      #primero imprime la variable y luego la incrementa
    endwhile;
    echo "<br>";

    $i = 1;
    do {
        echo $i." ";
        $i++;
    } while ($i <= 10);
    echo "<br>";

    for ($j = 1; $j <= 10; $j++){
        echo "$j ";
    }
    echo "<br>";

    for ($j = 1; ; $j++){   #si quitas la condicion tienes que controlarlo en otro lado
        if ($j > 10){
            break;
        }
        echo "$j ";
    }
    echo "<br>";

    for ($j = 1; $j <= 50; $j++){
        if ($j % 3 == 0){
            echo "$j ";
        }
    }
    echo "<br>";

    echo "[";
    for ($j = 1; $j <= 50; $j++){
        if ($j+3 > 50 && $j % 3 == 0){
            echo "$j]";
        }else{
            if ($j % 3 == 0){
                echo "$j, ";
            }
        }
    }
    echo "<br>";

    $suma = 0;
    for ($j = 1; $j <= 20; $j++){
        if ($j % 2 == 0){
            $suma += $j;
        }
    }
    echo "$suma<br>";

    echo "<ul>";
    for ($k = 2; $k <= 50; $k++){
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
    echo "</ul><br><br>";

    echo "<ul>";
    $cont = 0;
    for ($k = 2; $cont < 50; $k++){
        $bool = true;
        for ($j = 2; $j <= $k/2 && $bool; $j++){
            if ($k % $j == 0){
                $bool = false;
            }
        }
        if ($bool){
            echo "<li>$k</li>";
            $cont++;
        }
    }
    echo "</ul><br><br>";

    $multi = 1;
    for ($j = 1; $j <= 8 ; $j++){
        $multi *= $j;
    }
    echo $multi;

    ?>
</body>
</html>