<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Comic</title>
    <?php require 'Util/db_comics.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
        if(!isset($_GET["id"])) header('location: index.php');
        if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])){
            $id = $_GET["id"];
        
            $sql = $_conexion -> prepare("SELECT * FROM comics WHERE id_comic = ?;");
            $sql -> bind_param("i", $id);
            $sql -> execute();
            $resultado = $sql -> get_result();
            $_conexion -> close();
            $comic = $resultado ->fetch_assoc();
        ?>
        <div class="container mt-5 text-center">
            <h1><?php echo $comic["titulo_comic"] ?></h1>
            <h2>Genero: <?php echo $comic["genero"] ?></h2>
            <h3>Numero de páginas: <?php echo $comic["paginas"] ?></h3>
            
            <div class="row mt-3">
                <div class="col text-end">
                    <form action="edit_comic.php" method="GET">
                        <input type="hidden" name="id" value="<?php echo $comic["id_comic"] ?>">
                        <input class="btn btn-dark" type="submit" value="Editar">
                    </form>
                </div>
                <div class="col text-start">
                    <a class="btn btn-dark" href="index.php">Volver</a>
                </div>
            </div>
        </div>
        <?php
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>