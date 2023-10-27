<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 2</title>
    <?php require 'ejercicio1.php' ?>
    <?php require 'ejercicio2.php' ?>
    <?php require 'ejercicio3.php' ?>
    <style>
        body{
            display: grid;
            grid-template-columns: 1fr 4fr 1fr;
            margin-top: 80px;
        }
        .main-container{
            display: grid;
            grid-column: 2;
            justify-content: center;
            text-align: center;
        }
        table.tabla-bonita{
            text-align: center;
            background-color: aquamarine;
            border: 1px solid black;
            border-collapse: collapse;
        }
        th{
            background-color: aqua;
        }
        th,td{
            border: 1px solid black;
            
        }
        caption{
            background-color: lightseagreen;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <form action="" method="GET">
            <fieldset>
                <label for="">Dinero</label><br>
                <input type="number" name="dinero" step="0.01"><br><br>
                <label for="">Divisa 1:</label><br>
                <input type="radio" name="div1" value="E"><label for="euro">Euro</label>
                <input type="radio" name="div1" value="D"><label for="dolar">Dolar</label>
                <input type="radio" name="div1" value="Y"><label for="yen">Yen</label><br><br>
                <label for="">Divisa 2:</label><br>
                <input type="radio" name="div2" value="E"><label for="euro">Euro</label>
                <input type="radio" name="div2" value="D"><label for="dolar">Dolar</label>
                <input type="radio" name="div2" value="Y"><label for="yen">Yen</label><br><br>
                <input type="hidden" name="f" value="ej1">
                <input type="submit" value="Enviar">
                <br>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET"){
                        if (isset($_GET["f"])){
                            if ($_GET["f"] == "ej1"){
                                if ($_GET["div1"] != $_GET["div2"]){
                                    echo ("El dinero cambiado es: " . cambiarDivisas($_GET["dinero"], $_GET["div1"], $_GET["div2"]) . "<br>");
                                }
                            }
                        }
                    }
                ?>
            </fieldset>
        </form>
        
        <br><br>
        
        <form action="" method="GET">
            <fieldset>
                <label for="">Numero</label><br>
                <input type="number" name="numero"><br><br>
                <label for="">Operacion</label><br>
                <select id="operacion" name="op">
                    <option value="sum">Sumatorio</option>
                    <option value="fac">Factorial</option>
                </select><br><br>
                <input type="hidden" name="f" value="ej2">
                <input type="submit" value="Enviar">
                <br>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET"){
                        if (isset($_GET["f"])){
                            if ($_GET["f"] == "ej2"){
                                if ($_GET["op"] == "sum"){
                                    echo (sumatorio($_GET["numero"]) . "<br>");
                                }
                                else if ($_GET["op"] == "fac"){
                                    echo (factorial($_GET["numero"]) . "<br>");
                                }
                            }
                        }
                    }
                ?>
            </fieldset>
        </form>
        
        <br><br>
        
        <?php
            $animales = [
                ["Lobo ibérico", "Mamífero", 2500],
                ["Lince ibérico", "Mamífero", 1668],
                ["Quebrantahuesos", "Ave", 2000],
                ["Oso pardo", "Mamífero", 500]
            ];
        ?>
        <table class="tabla-bonita">
            <caption>Animales</caption>
            <tr>
                <th>Especie</th>
                <th>Clase</th>
                <th>Ejemplares</th>
                <th>Estado</th>
            </tr>
            <?php
            foreach ($animales as $animal){
                list($especie,$clase,$numero) = $animal;
                echo "<tr>";
                echo "<td>" . $especie . "</td>";
                echo "<td>" . $clase . "</td>";
                echo "<td>" . $numero . "</td>";
                echo "<td>" . comprobarEstado($numero) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
        <h2>Buscar especie</h2>
        <form action="" method="GET">
            <fieldset>
                <label for="">Especie: </label>
                <input type="text" name="especie"><br><br>
                <input type="hidden" name="f" value="ej3">
                <input type="submit" value="Enviar">
                <br>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET"){
                        if (isset($_GET["f"])){
                            if ($_GET["f"] == "ej3"){
                                echo ($_GET["especie"] . buscar($animales, $_GET["especie"]) . "<br>");
                            }
                        }
                    }
                ?>
            </fieldset>
        </form>
    </div>
</body>
</html>