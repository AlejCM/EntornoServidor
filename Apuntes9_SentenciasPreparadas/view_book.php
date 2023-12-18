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
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])){
            $id = $_POST["id"];
        
            $sql = $_conexion -> prepare("SELECT * FROM libros WHERE titulo = ?;");
            $sql -> bind_param("s", $id);
            $sql -> execute();
            $resultado = $sql -> get_result();
            $_conexion -> close();
            $libro = $resultado ->fetch_assoc();
        ?>
        <div class="container mt-3">
            <h1><?php echo $libro["titulo"] ?></h1>
            <h2>Autor: <?php echo $libro["autor"] ?></h2>
            <h3>Numero de páginas: <?php echo $libro["paginas"] ?></h3>
            
            <div class="row mt-3">
                <div class="col-1">
                    <form action="edit_book.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $libro["titulo"] ?>">
                        <input class="btn btn-primary" type="submit" value="Editar">
                    </form>
                </div>
                <div class="col-1">
                    <a class="btn btn-primary" href="index.php">Volver</a>
                </div>
                
            </div>
        </div>
        <?php
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>