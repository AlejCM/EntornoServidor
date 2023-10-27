<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require 'videojuego.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
        $videojuego1 = new Videojuego (1, "Spiderman", "7", "Sony");
        $videojuego2 = new Videojuego (2, "Skyrim", "18", "Bethesda");
        $videojuego3 = new Videojuego (3, "LoL", "16", "Riot");
        echo $videojuego1 -> titulo;
        $lista = [$videojuego1, $videojuego2, $videojuego3];
    ?>
    <table  class="table table-secondary table-hover table-striped">
    <caption class="table caption-top"><h1>Juegos</h1></caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Pegi</th>
                <th>Compañia</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($lista as $juego){
                    echo "<tr>";
                    echo "<td>" . $juego -> id_videojuego . "</td>";
                    echo "<td>" . $juego -> titulo . "</td>";
                    echo "<td>" . $juego -> pegi . "</td>";
                    echo "<td>" . $juego -> compania . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>