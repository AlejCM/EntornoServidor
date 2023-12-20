<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require '../Funciones/db_videojuegos.php' ?>
</head>
<body>
    <?php
        $sql = "SELECT * FROM videojuegos";
        $resultado = $conexion -> query($sql);
    ?>
    <table  class="table table-secondary table-hover table-striped">
    <caption class="table caption-top"><h1>Juegos</h1></caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Pegi</th>
                <th>Compañia</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($fila = $resultado -> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $fila["id_videojuego"] . "</td>";
                    echo "<td>" . $fila["titulo"] . "</td>";
                    echo "<td>" . $fila["pegi"] . "</td>";
                    echo "<td>" . $fila["compania"] . "</td>";
                    ?>
                    <td><img src="<?php echo $fila["imagen"] ?>" alt=""></td>
                    <?php
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>