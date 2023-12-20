<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
    <?php require '../Funciones/db_login.php' ?>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = $conexion -> query($sql);
        
        if ($resultado -> num_rows === 0){
            echo "El usuario no existe";
        }else{
            while ($fila = $resultado -> fetch_assoc()){
                $contrasena_cifrada = $fila["contrasena"];
            }
    
            $acceso_valido = password_verify($contrasena, $contrasena_cifrada);
    
            if ($acceso_valido) {
                echo "TE HAS LOGUEADO CON EXITO";
                session_start();
                $_SESSION["usuario"] = $usuario;
                $_SESSION["loquesea"] = "loquesea";
                header('location: principal.php');
    
            }else{
                echo "LA CONTRASEÑA ESTA MAL";
            }
        }
    }
    ?>
    <div class="container">
        <h1>Inicio de Sesion</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" type="text" name="usuario">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" type="password" name="contrasena">
            </div>
            <input class="btn btn-primary" type="submit" value="Registrarse">
        </form>
    </div>
</body>
</html>