<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <?php require '../Util.php' ?>
    <?php require '../Funciones/db_usuarios.php' ?>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $temp_usuario = depurar($_POST["usuario"]);
        $temp_nombre = depurar($_POST["nombre"]);
        $temp_apellidos = depurar($_POST["apellidos"]);
        $temp_nacimiento = depurar($_POST["fecha_nacimiento"]);
        if (strlen($temp_usuario) == 0){
            $err_usuario = "El nombre de usuario es obligatorio";
        } else{
            $regex = "/^([a-zA-Z][a-zA-Z0-9_]{3,7})$/"; 
            //Las expresiones regulares son /^Expresion$/
            //se comprueban las expresiones regulares con preg_match(expresion, string)
            if (!preg_match($regex, $temp_usuario)){
                $err_usuario = "El usuario debe contener de 4-8 caracteres, numeros o _";
            } else{
                $usuario = $temp_usuario;
            }
        }
        if (strlen($temp_nombre) == 0){
            $err_nombre = "Campo Incompleto";
        } else{
            $regex = "/^([a-zA-ZñÑ\ ]{2,20})$/"; 
            if (!preg_match($regex, $temp_nombre)){
                $err_nombre = "El usuario debe contener de 4-8 caracteres, numeros o _";
            } else{
                $nombre = $temp_nombre;
            }
        }
        if (strlen($temp_apellidos) == 0){
            $err_apellidos = "Campo Incompleto";
        } else{
            $regex = "/^([a-zA-ZñÑ\ ]{2,40})$/"; 
            if (!preg_match($regex, $temp_apellidos)){
                $err_apellidos = "El usuario debe contener de 4-8 caracteres, numeros o _";
            } else{
                $apellidos = $temp_apellidos;
            }
        }
        //fecha nacimiento
        
        if (strlen($temp_nacimiento) == 0){
            $err_nacimiento = "Campo Incompleto";
        } else{
            $regex = "/^([0-9]{4}[-][0-9]{2}[-][0-9]{2})$/"; 
            if (!preg_match($regex, $temp_nacimiento)){
                $err_nacimiento = "Campo Incorrecto";
            } else{
                $temp_nacimiento_array = explode("-", $temp_nacimiento);
                $year = (int)(date("Y"));
                if ($year - (int)($temp_nacimiento_array[0]) < 18){
                    $err_nacimiento = "Eres menor";
                } else if ($year - (int)($temp_nacimiento_array[0]) > 18){
                    $f_nacimiento = $temp_nacimiento;
                } else{
                    $month = (int)(date("M"));
                    if ($month - (int)($temp_nacimiento_array[1]) < 0){
                        $err_nacimiento = "Eres menor";
                    } else if ($month - (int)($temp_nacimiento_array[1]) > 0){
                        $f_nacimiento = $temp_nacimiento;
                    } else{
                        $day = (int)(date("j"));
                        if ($day - (int)($temp_nacimiento_array[2]) < 0){
                            $err_nacimiento = "Eres menor";
                        } else{
                            $f_nacimiento = $temp_nacimiento;
                        }
                    }
                }
            }
            
            var_dump($temp_nacimiento);
        }
        
    }


    ?>
    <form action="" method="post">
        <label>Usuario</label>
        <input type="text" name="usuario"><br>
        <?php if(isset($err_usuario)) echo $err_usuario ?><br>
        <label>Nombre</label>
        <input type="text" name="nombre"><br>
        <?php if(isset($err_nombre)) echo $err_nombre ?><br>
        <label>Apellidos</label>
        <input type="text" name="apellidos"><br>
        <?php if(isset($err_apellidos)) echo $err_apellidos ?><br>
        <label>Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento"><br>
        <?php if(isset($err_nacimiento)) echo $err_nacimiento ?><br>
        <input type="submit" value="Enviar">
    </form>
    <?php 
        if(isset($usuario) && isset($nombre) && isset($apellidos) && isset($f_nacimiento)){
        echo "<h2>$usuario</h2>";
        echo "<h2>$nombre $apellidos</h2> ";
        echo "<h2>$f_nacimiento</h2>";

        $sql = "INSERT INTO usuarios (usuario, nombre, apellidos, f_nacimiento)
            VALUES ('$usuario', '$nombre', '$apellidos', '$f_nacimiento')";
        
        $conexion -> query($sql);
        
    } 
    ?>
</body>
</html>