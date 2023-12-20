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
        $estudiantes = [
            ["Pedro", rand(0,10)],
            ["Javi", rand(0,10)],
            ["Rute", rand(0,10)],
            ["Manu", rand(0,10)],
            ["Ale", rand(0,10)],
            ["Sergio", rand(0,10)],
            ["Lucia", rand(0,10)],
            ["Denis", rand(0,10)],
            ["Ana", rand(0,10)],
            ["Pablo", rand(0,10)],
        ];

        $nombreest = array_column($estudiantes, 0);
        $nota = array_column($estudiantes, 1);
        //$final = array_column($estudiantes, 2);
        array_multisort($nombreest, SORT_ASC, $nota, SORT_ASC,/* $final, SORT_ASC,*/$estudiantes);
    ?>
    <br>
    <table class="tabla-bonita">
        <caption>Estudiantes</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nota</th>
                <th>Nota Final</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($estudiantes as $estudiante){
                    list($nombreest,$nota) = $estudiante;
                    echo "<tr>";
                    echo "<td>$nombreest" . "</td>";
                    echo "<td>$nota" . "</td>";
                    echo "<td>";
                    switch ($nota) {
                        case 0:
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                            echo( "Suspenso");
                            break;
                        case 5:
                        case 6:
                            echo( "Aprobado");
                            break;
                        case 7:
                        case 8:
                            echo( "Notable");
                            break;
                        default:
                            echo( "Sobresaliente");
                            break;
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <?php
        #1
        $productos = [
            ["agua", 1],
            ["chocolate", 2.5],
            ["pan", 0.3],
            ["azucar", 2],
            ["leche", 1],
            ["tijeras", 4.5],
            ["arroz", 1.7],
        ];

        $nombrepro = array_column($productos, 0);
        $preciopro = array_column($productos, 1);
        array_multisort($nombrepro, SORT_ASC, $preciopro, SORT_ASC, $productos);
    ?>
    <br>
    <table class="tabla-bonita">
        <caption>Productos</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $cont = 0;
                foreach($productos as $producto){
                    list($nombrepro,$preciopro) = $producto;
                    echo "<tr>";
                    echo "<td>$nombrepro" . "</td>";
                    echo "<td>$preciopro" . "</td>";
                    $cont+= $preciopro;
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <?php
        echo "El precio total es: $cont €<br>";
        echo "Hay " . count($productos) . " productos <br>  <br>  <br>";



        #3
        echo "<br><br>";

        $numeros = [];
        for ($i = 1; $i<=50; $i++){
            array_push($numeros, $i);
        }
        //print_r($numeros);
        foreach ($numeros as $key => $numero){
            if ($numero % 3 == 0){
                unset($numeros[$key]);
            }
        }
        print_r($numeros);

        #4
        echo "<br><br>";
        $personas = [
            ["pedro", "antonio", rand(0,100)],
            ["rute", "turron", rand(0,100)],
            ["manu", "cabra", rand(0,100)],
            ["ana", "maria", rand(0,100)],
            ["ale", "cruz", rand(0,100)],


        ];
    ?>
    <br>
    <table class="tabla-bonita">
        <caption>Productos</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Etapa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $cont = 0;
                foreach($personas as $persona){
                    list($nombreper,$apellidoper, $edadper) = $persona;
                    echo "<tr>";
                    echo "<td>$nombreper" . "</td>";
                    echo "<td>$apellidoper" . "</td>";
                    echo "<td>$edadper" . "</td>";
                    $epoca = match (true) {
                        $edadper >= 0 && $edadper < 18 => "Menor",
                        $edadper >= 18 && $edadper < 65 => "Adulto",
                        $edadper >= 65 && $edadper <= 100 => "Jubilado",
                        default => "Error"
                    };
                    echo "<td>$epoca" . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <?php
        #5
        echo "<br><br>";
        $dnis = [
            ["pedro", "12334845M"],
            ["rute", "78945612L"],
            ["manu", "123456789K"],
            ["ana", "1584726K"],
            ["ale", "12345678L"],
        ];
    ?>
    <br>
    <table class="tabla-bonita">
        <caption>Productos</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dni</th>
                <th>Validado</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($dnis as $persona){
                    list($nombre,$dni) = $persona;
                    echo "<tr>";
                    echo "<td>$nombre" . "</td>";
                    echo "<td>$dni" . "</td>";
                    $valido = match (true) {
                        strlen($dni) == 9 => "Valido",
                        default => "No es Valido"
                    };
                    echo "<td>$valido" . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <?php
    ?>
</body>
</html>