<?php require '../Funciones/db_libros.php' ?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])){
        $id = $_POST["id"];

        $sql = $_conexion -> prepare("DELETE FROM libros WHERE titulo = ?");
        $sql -> bind_param("s", $id);
        $sql -> execute();
    }

    header('location: index.php');
?>