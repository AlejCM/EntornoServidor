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
            $busqueda = $_POST["buscar"];
            $categoria = $_POST["categoria"];
            $orden = $_POST["orden"];
        }
    ?>
    <div class="container mt-3">
        <h1>Libros</h1>
        <form action="" method="POST">
            <div class="row mb-3">
                <div class="col-6">
                    <input class="form-control" type="text" name="buscar">
                </div>
                <div class="col-2">
                    <input class="btn btn-dark" type="submit" value="Buscar">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <select class="form-select" name="categoria" id="categoria">
                        <option value="titulo" selected>Título</option>
                        <option value="autor">Autor</option>
                        <option value="paginas">Páginas</option>
                    </select>
                </div>
                <div class="col-4">
                    <select class="form-select" name="orden" id="orden">
                        <option value="asc" selected>Ascendente</option>
                        <option value="desc">Descendente</option>
                    </select>
                </div>
            </div>
        </form>
        <?php
            if (isset($busqueda)){
                $sql = $_conexion -> prepare("SELECT * FROM libros WHERE titulo LIKE CONCAT('%', ?, '%')  ORDER BY $categoria $orden;");
                $sql -> bind_param("s", $busqueda);
                $sql -> execute();
                $resultado = $sql -> get_result();
                $_conexion -> close();
            } else{
                $sql = $_conexion -> prepare("SELECT * FROM libros;");
                $sql -> execute();
                $resultado = $sql -> get_result();
                $_conexion -> close();
            }
        ?>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Páginas</th>
                    <th>Autor</th>
                    <th>Visitar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($libro = $resultado ->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $libro["titulo"] ?></td>
                                <td><?php echo $libro["paginas"] ?></td>
                                <td><?php echo $libro["autor"] ?></td>
                                <td>
                                    <form action="view_book.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $libro["titulo"] ?>">
                                        <input class="btn btn-secondary" type="submit" value="Ver">
                                    </form>
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>