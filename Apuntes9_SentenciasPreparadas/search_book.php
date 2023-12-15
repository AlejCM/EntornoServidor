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

            // Aqui es _conexion por como esta en db_libros
            $sql = $_conexion -> prepare("SELECT * FROM libros WHERE titulo LIKE CONCAT('%', ?, '%');");
            $sql -> bind_param("s", $busqueda);
            $sql -> execute();
            $resultado = $sql -> get_result();
        }
    ?>

    <div class="container mt-3">
        <h1>Busqueda</h1>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Páginas</th>
                    <th>Autor</th>
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