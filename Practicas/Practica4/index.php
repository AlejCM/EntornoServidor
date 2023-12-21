<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <?php require 'Util/db_comics.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if (isset($_POST["minimo"]) && isset($_POST["maximo"]) && $_POST["minimo"] != "" && $_POST["maximo"] != ""){
                $b_minimo = $_POST["minimo"];
                $b_maximo = $_POST["maximo"];
            }
            if (isset($_POST["genero"]) && $_POST["genero"] != "Ninguno"){
                $b_genero = $_POST["genero"];
            }
        }
    ?>
    <div class="container mt-3">
        <h1>Comics</h1>
        <a class="btn btn-dark mb-3" href="create_comic.php">Crear Comics</a>
        <form action="" method="POST">
            <div class="row mb-3 align-items-center">
                <div class="col">
                    <input class="form-control" type="number" name="minimo">
                </div>
                <div class="col">
                    <input class="form-control" type="number" name="maximo">
                </div>
                <div class="col text-end">Genero:</div>
                <div class="col">
                    <select class="form-select" name="genero" id="genero">
                        <option value="Ninguno" selected>---------</option>
                        <option value="Accion">Acción</option>
                        <option value="Aventuras">Aventuras</option>
                        <option value="Romance">Romance</option>
                        <option value="Comedia">Comedia</option>
                    </select>
                </div>
                <div class="col text-end">
                    <input class="btn btn-dark" type="submit" value="Buscar">
                </div>
            </div>
        </form>
        <?php 
            if (isset($b_minimo) && isset($b_genero)){
                //Los dos filtros
                $sql = $_conexion -> prepare("SELECT * FROM comics WHERE genero = ? AND paginas >= ? AND paginas <= ?;");
                $sql -> bind_param("sii", $b_genero, $b_minimo, $b_maximo);
                $sql -> execute();
                $resultado = $sql -> get_result();
                $_conexion -> close();
            } else if (isset($b_minimo)){
                //Solo el filtro de minimo y maximo de paginas
                $sql = $_conexion -> prepare("SELECT * FROM comics WHERE paginas >= ? AND paginas <= ?;");
                $sql -> bind_param("ii", $b_minimo, $b_maximo);
                $sql -> execute();
                $resultado = $sql -> get_result();
                $_conexion -> close();
            } else if (isset($b_genero)){
                //Solo el filtro de genero
                $sql = $_conexion -> prepare("SELECT * FROM comics WHERE genero = ?;");
                $sql -> bind_param("s", $b_genero);
                $sql -> execute();
                $resultado = $sql -> get_result();
                $_conexion -> close();
            } else {
                //Sin filtros
                $sql = $_conexion -> prepare("SELECT * FROM comics;");
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
                    <th>Genero</th>
                    <th>Ver</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($comic = $resultado ->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $comic["titulo_comic"] ?></td>
                                <td><?php echo $comic["paginas"] ?></td>
                                <td><?php echo $comic["genero"] ?></td>
                                <td>
                                    <form action="view_comic.php" method="GET">
                                        <input type="hidden" name="id" value="<?php echo $comic["id_comic"] ?>">
                                        <input class="btn btn-secondary" type="submit" value="Ver">
                                    </form>
                                </td>
                                <td>
                                    <form action="delete_comic.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $comic["id_comic"] ?>">
                                        <input class="btn btn-danger" type="submit" value="Eliminar">
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