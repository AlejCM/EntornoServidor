<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php</title>
</head>
<body>
    <!--Comentario html-->
    <?php
    //esto es un comentario
    /**
     * esto es un comentario
     */
    #esto es un comentario
    echo "<h1 style='color:red'>hola mundo</h1>";
    $entero = 1;      #entero
    $decimal = 1.5;   #float
    $exponente = 4e5; #4 x 10^5
    $string1 = 'Esto es un string';
    $string2 = "mundo";
    $string3 = "Hola $string2"; #se concatenan strings si estan con "", con '' no puedes concatenar
    $string4 = 'Hola ' . $string1 . ", Entero: " . $entero;#puedes concatenar con el . como si fuese un + 
    $boleano = true;

    var_dump($entero);#dice que es un int y su valor en este caso 1
    echo "<br>";
    var_dump($decimal);
    echo "<br>";
    var_dump($exponente);
    echo "<br>";
    var_dump($string1);
    echo "<br>";
    var_dump($string2);
    echo "<br>";
    var_dump($string3);
    echo "<br>";
    var_dump($string4);
    echo "<br>";
    var_dump($boleano);

    $array1 = [1,2,3];
    $array2 = [1,"dos", 3];

    var_dump($array1);
    echo "<br>";
    var_dump($array2);

    echo "<br><br>";

    define("EDAD",23);  #El nombre de las constantes SIEMPRE EN MAYUSCULAS
    echo EDAD;

    /**&& o and     uno y otro
     * || o or      o uno u otro
     * !            distinto
     * xor          o uno u otro pero no ambos
     */
    echo "<br>";
    $ndia = date("d");
    if ($ndia <= 15){
        echo "Estamos a principios de mes";
    } else{
        echo "Estamos a finales de mes";
    }
    #mirar la documentacion de la funcion date de php para ver lo que se puede usar
    echo "<br>";

    $hora = date("G");
    if ($hora < 12){
        echo "buenos dias";
    } else if ($hora >= 12 && $hora < 20){
        echo "Buenas tardes";
    } else{
        echo "Buenas noches";
    }

    echo "<br>";

    $random = rand(1,150);      #random entre 1 y 150 con ambos incluidos
    #rand(35,82)/10 coge decimales entre 3.5 y 8.2
    if ($random<10){
        echo "$random tiene 1 digito";
    } else if ($random>=10 && $random<100){
        echo "$random tiene 2 digitos";
    }else{
        echo "$random tiene 3 digitos";
    }
    echo "<br>";

    $decRedondeado = intval($decimal);  #intval cambia a entero un decimal y coge la parte entera 1.7 -> 1
    echo $decRedondeado;
    echo "<br>";

    $n = rand (1,3);
    switch ($n) {
        case 1:
            echo "$n es igual a 1";
            break;
        case 2:
            echo "$n es igual a 2";
            break;
        default:
            echo "$n es igual a 3";
            break;                      #break opcional en el default
    }
    echo "<br>";

    $dia = date("l");
    switch ($dia) {
        case "Monday":
        case "Wednesday":
        case "Friday":
            echo "Hoy si hay clases de Desarrollo Web Servidor";
            break;
        default:
            echo "Hoy no hay clases de Desarrollo Web Servidor";
            break;
    }
    echo "<br>";

    $dia = date("N");       #Puedo reutilizar la variable porque los numeros que coge date se consideran cadenas
    switch ($dia) {
        case 1:
            echo "Hoy es Lunes";
            break;
        case 2:
            echo "Hoy es Martes";
            break;
        case 3:
            echo "Hoy es Miercoles";
            break;
        case 4:
            echo "Hoy es Jueves";
            break;
        case 5:
            echo "Hoy es Viernes";
            break;
        case 6:
            echo "Hoy es Sabado";
            break;
        default:
            echo "Hoy es Domingo";
            break;
    }
    echo "<br>";
    //ahora con la funcion match
    $dia_es = match($dia){
        "1"=>"Lunes",
        "2"=>"Martes",
        "3"=>"Miercoles",
        "4"=>"Jueves",
        "5"=>"Viernes",
        "6"=>"Sabado",
        "7"=>"Domingo"
    };
    $mes = date("n");
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
    #$ndia esta mas arriba en otro ejemplo
    echo "Hoy es $dia_es $ndia de $mes_es";
    echo "<br>";

    

    ?>
</body>
</html>