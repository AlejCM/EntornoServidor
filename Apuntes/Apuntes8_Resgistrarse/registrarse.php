<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require '../Funciones/db_login.php' ?>
</head>
<body>
    <?php    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrada')";
        $conexion -> query($sql);
        /* if (strlen($temp_usuario) == 0){
            $err_usuario = "Campo Incompleto";
        } else{
            $regex = "/^([a-zA-Z0-9_]{4,12})$/"; 
            if (!preg_match($regex, $temp_usuario)){
                $err_usuario = "El usuario debe contener de 4-12 caracteres";
            } else{
                $usuario = $temp_usuario;
            }
        }

        if (strlen($temp_contrasena) == 0){
            $err_contrasena = "Campo Incompleto";
        } else{
            if (strlen($temp_contrasena) > 255){
                $err_contrasena = "La contraseña es muy larga";
            } else{
                $contrasena = $temp_contrasena;
            }
        } */
    }
    ?>
    <div class="container">
        <h1>Registrarse</h1>

        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" type="text" name="usuario">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" type="password" name="contrasena">
            </div>
            <input type="submit" value="Registrarse">
        </form>
    </div>
</body>
</html>