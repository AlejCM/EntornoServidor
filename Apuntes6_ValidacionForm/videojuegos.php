<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require '../Util.php' ?>
    <?php require '../Funciones/db_videojuegos.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="container">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $temp_titulo = depurar($_POST["titulo"]);
        $temp_id = depurar($_POST["id"]);
        $temp_pegi = depurar($_POST["pegi"]);
        $temp_compania = depurar($_POST["compania"]);
        
        if (strlen($temp_titulo) == 0){
            $err_titulo = "El titulo es obligatorio";
        } else{
            $regex = "/^([a-zA-Z0-9_]{1,100})$/"; 
            if (!preg_match($regex, $temp_titulo)){
                $err_titulo = "El titulo debe contener de 1-100 caracteres, numeros o _";
            } else{
                $titulo = $temp_titulo;
            }
        }

        if (strlen($temp_id) == 0){
            $err_id = "Campo Incompleto";
        } else{
            $regex = "/^([0-9]{1,8})$/"; 
            if (!preg_match($regex, $temp_id)){
                $err_id = "El id debe contener de 1-8 numeros";
            } else{
                $id = $temp_id;
            }
        }

        if (strlen($temp_pegi) == 0){
            $err_pegi = "Campo Incompleto";
        } else{
            $lista_pegi_validos = ["3", "7", "12", "16", "18"];
            if (!in_array($temp_pegi, $lista_pegi_validos)) {
                $err_pegi = "El pegi tiene que ser uno de los valores";
            } else{
                $pegi = $temp_pegi;
            }
        }
        
        if (strlen($temp_compania) == 0){
            $err_compania = "Campo Incompleto";
        } else{
            $regex = "/^([a-zA-ZñÑ\ ]{1,50})$/"; 
            if (!preg_match($regex, $temp_compania)){
                $err_compania = "La compañia debe contener 50 caracteres";
            } else{
                $compania = $temp_compania;
            }
        }
    }
    ?>
    <h1>Nuevo Juego</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label">Titulo</label>
            <input class="form-control" type="text" name="titulo">
            <?php if(isset($err_titulo)) echo $err_titulo ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Id</label>
            <input class="form-control" type="text" name="id">
            <?php if(isset($err_id)) echo $err_id ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Pegi</label>
            <select class="form-select" id="pegi" name="pegi">
                <option selected hidden>-- Elige un Pegi --</option>
                <option value="3">3</option>
                <option value="7">7</option>
                <option value="12">12</option>
                <option value="16">16</option>
                <option value="18">18</option>
            </select>
            <?php if(isset($err_pegi)) echo $err_pegi ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Compañia</label>
            <input class="form-control" type="text" name="compania">
            <?php if(isset($err_compania)) echo $err_compania ?>
        </div>
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>

    <?php 
        if(isset($titulo) && isset($id) && isset($pegi) && isset($compania)){
        echo "<h2>$titulo</h2>";
        echo "<h2>$id $pegi</h2> ";
        echo "<h2>$compania</h2>";

        $sql = "INSERT INTO videojuegos (id_videojuego, titulo, pegi, compania)
            VALUES ('$id', '$titulo', '$pegi', '$compania')";
        
        $conexion -> query($sql);
    } 
    ?>

</body>
</html>