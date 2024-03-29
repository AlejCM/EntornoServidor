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
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $titulo = $_POST["titulo"];
            $paginas = (int) $_POST["paginas"];
            $autor = $_POST["autor"];

            // Aqui es _conexion por como esta en db_libros
            $sql = $_conexion -> prepare("INSERT INTO libros VALUES (?, ?, ?)");
            $sql -> bind_param("sis", $titulo, $paginas, $autor);
            $sql -> execute();
        }
    ?>

    <div class="container">
        <h1>Crear Libro</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo">
            </div>
            <div class="mb-3">
                <label class="form-label">Páginas</label>
                <input class="form-control" type="number" name="paginas">
            </div>
            <div class="mb-3">
                <label class="form-label">Autor/a</label>
                <input class="form-control" type="text" name="autor">
            </div>
            <div class="row mb-3">
                <div class="col-1">
                    <input class="btn btn-primary" type="submit" value="Crear">
                </div>
                <div class="col-1">
                    <a class="btn btn-primary" href="index.php">Volver</a>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>