<?php require 'Util/db_comics.php' ?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])){
        $id = $_POST["id"];

        $sql = $_conexion -> prepare("DELETE FROM comics WHERE id_comic = ?");
        $sql -> bind_param("i", $id);
        $sql -> execute();
    }

    header('location: index.php');
?>