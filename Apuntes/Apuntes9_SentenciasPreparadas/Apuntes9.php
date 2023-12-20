<?php

    $stmt = $mysqli -> prepare("INSERT INTO test (precio, titulo, id) VALUES (?, ?, ?)")
    $stmt -> bind_param("dsi", $precio, $titulo, $id);   //double string integer --> dsi
    $stmt -> execute();

?>