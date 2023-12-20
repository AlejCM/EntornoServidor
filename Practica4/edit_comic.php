<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comic</title>
    <?php require 'Util/db_comics.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
        //Entra cuando se edita
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])){
            $id = $_POST["id_comic"];
            $titulo = $_POST["titulo_comic"];
            $paginas = (int) $_POST["paginas"];
            $genero = $_POST["genero"];

            $sql = $_conexion -> prepare("UPDATE comics SET titulo_comic = ?, paginas = ?, genero = ?
                WHERE id_comic = ?;");
            $sql -> bind_param("sisi", $titulo, $paginas, $genero, $id);
            $sql -> execute();
            header('location: index.php');
        }

        //Coge esta salida si entra sin el id
        if(!isset($_GET["id"])) header('location: index.php');

        if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])){
            $id = $_GET["id"];

            $sql = $_conexion -> prepare("SELECT * FROM comics WHERE id_comic = ?;");
            $sql -> bind_param("s", $id);
            $sql -> execute();
            $resultado = $sql -> get_result();
            $_conexion -> close();
            $comic = $resultado ->fetch_assoc();
        }
    ?>
    
    <div class="container">
        <h1>Crear Comic</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo_comic" value="<?php echo $comic["titulo_comic"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Páginas</label>
                <input class="form-control" type="number" name="paginas" value="<?php echo $comic["paginas"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Genero</label>
                <select class="form-select" name="genero" id="genero">
                    <option value="<?php echo $comic["genero"] ?>" selected hidden><?php echo $comic["genero"] ?></option>
                    <option value="Accion">Acción</option>
                    <option value="Aventuras">Aventuras</option>
                    <option value="Romance">Romance</option>
                    <option value="Comedia">Comedia</option>
                </select>
            </div>
            <div class="row mb-3">
                <div class="col-1">
                    <input type="hidden" name="id_comic" value="<?php echo $comic["id_comic"] ?>">
                    <input type="hidden" name="edit" value="edit">
                    <input class="btn btn-dark" type="submit" value="Editar">
                </div>
                <div class="col-1">
                    <a class="btn btn-dark" href="index.php">Volver</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>