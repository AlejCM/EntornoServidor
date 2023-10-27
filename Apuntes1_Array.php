<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $array1 = [1,3,5,7];
        $array2 = [
            "key1" => "PS4",
            "key2" => "PS5",
            "key3" => "Xbox",
            "key4" => "gameboy",
            "key5" => "Switch"
        ];
        print_r($array2);
        echo "<br>";
        $array3 = [
            "789456123B" => "pedrito",
            "123456789H" => "Antonio",
            "456789456L" => "El Loco"
        ];
        print_r($array3);
        echo "<br>";
        array_push($array3, "EL bicho");    #hace push de array con clave 0 1 2 3 dependiendo si estan cogidas
        $array3["111111111P"] = "illoJuan"; #si no existe lo crea con la clave
        print_r($array3);
        echo "<br>";
        unset($array3[0]);                  #ellimina el valor del array con esa clave
        print_r($array3);
        echo "<br>";

        unset($array1[2]);
        array_push($array1, 25);
        print_r($array1);
        echo "<br>";

        $array1 = array_values($array1);    #revienta todas las claves y las vuelve a poner
        print_r($array1);
        echo "<br>";

        print(count($array1));              #cuenta los elementos de un array
        echo "<br>";

        foreach ($array3 as $array){
            echo $array . "<br>";
        }

        foreach ($array3 as $key => $array){
            echo $key . " => " . $array . "<br>";
        }
        ?>
        <table border='1'>
        <caption>Persona</caption>
        <tr><th>DNI</th><th>Nombre</th></tr>
        <?php
        foreach ($array3 as $key => $array){
            echo "<tr><td>" . $key . "</td><td>" . $array . "</td></tr>";
        }
        echo "</table>";

        $i = 0;
        while ($i < count($array1)) {
            echo $array1[$i] . " ";
            $i++;
        }
        echo "<br>";


        #sort reseta claves y ordena de menor a mayor
        #rsort resetea claves y ordena de mayor a menor
        #asort no resetea y ordena de menor a mayor
        #arsort no resetea y ordena de mayor a menor
        #ksort ordena de menor a mayor en base a claves
        #krsort ordena de mayor a menor en base a claves

        ksort($array3);
        ?>
        <table border='1'>
        <caption>Persona</caption>
        <tr><th>DNI</th><th>Nombre</th></tr>
        <?php
        foreach ($array3 as $dni => $nombre){
            echo "<tr><td>" . $dni . "</td><td>" . $nombre . "</td></tr>";
        }
        echo "</table>";
    ?>
</body>
</html>