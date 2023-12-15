<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require '../Funciones/db_libros.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
        if(!isset($_POST["id"])) header('location: index.php');
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["id"];
        }
        if (isset($id)){
            $sql = $_conexion -> prepare("SELECT * FROM libros WHERE titulo = ?;");
            $sql -> bind_param("s", $id);
            $sql -> execute();
            $resultado = $sql -> get_result();
            $_conexion -> close();
            $libro = $resultado ->fetch_assoc();
        }

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])){
            $titulo = $_POST["titulo"];
            $paginas = (int) $_POST["paginas"];
            $autor = $_POST["autor"];

            // Aqui es _conexion por como esta en db_libros
            $sql = $_conexion -> prepare("UPDATE libros SET titulo = ?, paginas = ?, autor = ?
                WHERE titulo = ?;");
            $sql -> bind_param("siss", $titulo, $paginas, $autor, $id);
            $sql -> execute();
        }
    ?>

    <!-- EDITAR EL FORMULARIO -->

    <div class="container">
        <h1>Crear Libro</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo" value="<?php echo $libro["titulo"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Páginas</label>
                <input class="form-control" type="number" name="paginas" value="<?php echo $libro["paginas"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Autor/a</label>
                <input class="form-control" type="text" name="autor" value="<?php echo $libro["autor"] ?>">
            </div>
            <div class="mb-3">
                <input type="hidden" name="edit" value="edit">
                <input class="btn btn-primary" type="submit" value="Editar">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>