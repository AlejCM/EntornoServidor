<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricipal</title>
    <?php require '../Funciones/db_login.php' ?>
</head>
<body>
    <?php
    session_start();
    $usuario = $_SESSION["usuario"];
    ?>
    <div class="container">
        <h1>Hola señor <?php echo $usuario ?></h1>
    </div>
</body>
</html>