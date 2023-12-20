<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    #1
    $random = rand(1,10);
    if ($random%2 == 0){
        echo "$random es PAR";
    } else{
        echo "$random es IMPAR";
    }
    echo "<br>";
    #2
    $random = rand(-10,10);
    if ($random < 0){
        echo "$random es negativo";
    } else if ($random > 0){
        echo "$random es positivo";
    } else{
        echo "$random es 0";
    }
    echo "<br>";
    #3
    echo "<ul>";
    for ($i = 1; $i <= 20; $i++){
        if ($i % 2 == 1){
            echo "<li>$i</li>";
        }
    }
    echo "</ul>";
    #4
    $ndia = date("d");
    $dia = date("N");
    $mes = date("n");
    $dia_es = match($dia){
        "1"=>"Lunes",
        "2"=>"Martes",
        "3"=>"Miercoles",
        "4"=>"Jueves",
        "5"=>"Viernes",
        "6"=>"Sabado",
        "7"=>"Domingo"
    };
    $mes_es = match($mes){
        "1"=>"Enero",
        "2"=>"Febrero",
        "3"=>"Marzo",
        "4"=>"Abril",
        "5"=>"Mayo",
        "6"=>"Junio",
        "7"=>"Julio",
        "8"=>"Agosto",
        "9"=>"Septiembre",
        "10"=>"Octubre",
        "11"=>"Noviembre",
        "12"=>"Diciembre"
    };
    echo "Hoy es $dia_es $ndia de $mes_es";
    echo "<br>";
    #5
    $zHoraria = date("e");
    echo "Estamos en la zona horaria $zHoraria";
    echo "<br>";
    ?>
</body>
</html>