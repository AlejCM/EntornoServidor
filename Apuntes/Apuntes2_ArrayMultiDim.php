<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Estilos.css">
</head>
<body>
    <?php
    $usuarios = array(
        array('Ned', 'Stark'),
        array('Daenerys', 'Targaryen'),
        array('Tyrion', 'Lannister'),
        array('Arya', 'Stark')
    );
    foreach($usuarios as $usuario){
        list($nombre,$apellido) = $usuario;
        echo "Nombre: $nombre" . "<br>";
        echo "Apellido: $apellido" . "<br>";
    }
    echo "<br>";

    $juegos = [
        ["Pacman", "Atari", 60],
        ["Fortnite", "PS4", 0],
        ["Mario Kart", "Super Nintendo", 70],
        ["Skyrim", "PC", 60],
        ["Fifa24", "PS5", 70]
    ];
    
    echo "<br>";
    
    ?>
    <table class="tabla-bonita">
        <caption>Mis Juegos</caption>
        <thead>
            <tr>
                <th>Juego</th>
                <th>Consola</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($juegos as $juego){
                    list($nombre,$consola,$precio) = $juego;
                    echo "<tr>";
                    echo "<td>$nombre" . "</td>";
                    echo "<td>$consola" . "</td>";
                    echo "<td>$precio" . "€</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <br>
    <?php
        $nombre = array_column($usuarios, 0);
        $apellido = array_column($usuarios, 1);
        array_multisort($nombre, SORT_ASC, $apellido, SORT_ASC, $usuarios);
        foreach($usuarios as $usuario){
            list($nombre,$apellido) = $usuario;
            echo "Nombre: $nombre" . "<br>";
            echo "Apellido: $apellido" . "<br>";
        }
        echo "<br>";
        $nuevo_usuario = ["Cersei", "Lannister"];
        array_push($usuarios, $nuevo_usuario);
        $nuevo_juego = ["Pokemon Purpura", "Nintendo Switch", 60];
        array_push($juegos, $nuevo_juego);

        for ($i=0; $i<count($juegos); $i++){
            $juegos[$i][3] = rand(10,2000);
        }
        #ordenamos el de los juegos
        $titulo = array_column($juegos, 0);
        $consola = array_column($juegos, 1);
        $precio = array_column($juegos, 2);
        $stock = array_column($juegos, 3);
        array_multisort($titulo, SORT_ASC, $consola, SORT_ASC, $precio, SORT_ASC, $stock, SORT_ASC, $juegos);
    ?>
    <br>
    <table class="tabla-bonita">
        <caption>Mis Juegos</caption>
        <thead>
            <tr>
                <th>Juego</th>
                <th>Consola</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php

                foreach($juegos as $juego){
                    list($nombre,$consola,$precio,$stock) = $juego;
                    echo "<tr>";
                    echo "<td>$nombre" . "</td>";
                    echo "<td>$consola" . "</td>";
                    echo "<td>$precio" . "€</td>";
                    echo "<td>$stock" . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <?php
        #unset($usuarios[0]) elimina usuarios 0
        #crea un array que tenga los pares de 1 a 50
        #baraja los elementos
        #muestra los elementos en orden desc
        echo "<br>";
        $pares = [];
        for ($i = 1; $i <= 50; $i++){
            if ($i % 2 == 0){
                array_push($pares,$i);
            }
        }
        shuffle($pares);
        foreach($pares as $par){
            echo "$par, ";
        }
        echo "<br>";
        asort($pares);
        foreach($pares as $par){
            echo "$par, ";
        }
        echo "<br>";

        #genera 10 numeros de 0 a 100 y muestralos normal menor a mayor y mayor a menor
        $random = [];
        $menor = [];
        $mayor = [];
        for ($i = 0; $i < 10; $i++){
            array_push($random,rand(0,100));
            array_push($menor,$random[$i]);
            array_push($mayor,$random[$i]);
        }
        sort($menor);
        rsort($mayor);

        for ($i = 0; $i < 10; $i++){
            echo $random[$i] . " ";
        }echo "<br>";

        foreach($menor as $element){
            echo $element . " ";
        }echo "<br>";

        
        for ($i = 0; $i < 10; $i++){
            echo $mayor[$i] . " ";
        }echo "<br>";

        #3
        $paises = array( "Italy"=>"Rome", "Luxembourg" =>"Luxembourg" , "Belgium"=>
            "Brussels" , "Denmark"=>"Copenhagen" , "Finland"=>"Helsinki" , "France" =>
            "Paris", "Slovakia" =>"Bratislava" , "Slovenia" =>"Ljubljana" , "Germany" =>
            "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin",
            "Netherlands" =>"Amsterdam" , "Portugal" =>"Lisbon", "Spain"=>"Madrid",
            "Sweden"=>"Stockholm" , "United Kingdom" =>"London", "Cyprus"=>"Nicosia",
            "Lithuania" =>"Vilnius", "Czech Republic" =>"Prague", "Estonia"=>"Tallin",
            "Hungary"=>"Budapest" , "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" =>
            "Vienna", "Poland"=>"Warsaw"
        ) ;
        ksort($paises);
    
    ?>
    <br>
    <table class="tabla-bonita">
        <caption>Paises</caption>
        <thead>
            <tr>
                <th>Pais</th>
                <th>Capital</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($paises as $pais => $capital){
                    echo "<tr>";
                    echo "<td>$pais" . "</td>";
                    echo "<td>$capital" . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <?php
        #4
        $series = [
            ["Pokemon", "Netflix", 23],
            ["One piece", "Netflix", 1],
            ["Sherlock", "HBO", 4],
            ["Suits", "Netflix", 8],
            ["Los anillos de poder", "Amazon", 1]
        ];
        ?>
    <br>
    <table class="tabla-bonita">
        <caption>Series 1</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($series as $serie){
                    list($nombre,$plataforma,$temporada) = $serie;
                    echo "<tr>";
                    echo "<td>$nombre" . "</td>";
                    echo "<td>$plataforma" . "</td>";
                    echo "<td>$temporada" . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <?php
    $nombre = array_column($series, 0);
    $plataforma = array_column($series, 1);
    $temporada = array_column($series, 2);
    array_multisort( $temporada, SORT_ASC, $plataforma, SORT_ASC, $nombre, SORT_ASC, $series);
    ?>
    <br>
    <table class="tabla-bonita">
        <caption>Series 2</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($series as $serie){
                    list($nombre,$plataforma,$temporada) = $serie;
                    echo "<tr>";
                    echo "<td>$nombre" . "</td>";
                    echo "<td>$plataforma" . "</td>";
                    echo "<td>$temporada" . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <?php
    $nombre = array_column($series, 0);
    $plataforma = array_column($series, 1);
    $temporada = array_column($series, 2);
    array_multisort($plataforma, SORT_ASC, $nombre, SORT_ASC, $temporada, SORT_ASC, $series);
    ?>
    <br>
    <table class="tabla-bonita">
        <caption>Series 3</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($series as $serie){
                    list($nombre,$plataforma,$temporada) = $serie;
                    echo "<tr>";
                    echo "<td>$nombre" . "</td>";
                    echo "<td>$plataforma" . "</td>";
                    echo "<td>$temporada" . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <?php
        #calcular el total de temporadas 
        #media de temporadas
        $cont = 0;
        foreach($series as $serie){
            list($nombre,$plataforma,$temporada) = $serie;
            $cont+= $temporada;
        }
        echo "<br>Hay " . $cont . " temporadas <br>";
        echo "La media de temporadas es: " . ($cont/count($series)) . "<br>";

        #5
        

    ?>
    
</body>
</html>