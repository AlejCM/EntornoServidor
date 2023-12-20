<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- https://regexr.com/ -->
    <form action="" method="post">
        <label for="Dni">Dni: </label>
        <input type="text" id="dni" name="dni" pattern="[0-9]{8}[A-Za-z]{1}"><br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            echo ("El dni es: " . $_POST["dni"] . "<br>");
        }
        ?>
</body>
</html>