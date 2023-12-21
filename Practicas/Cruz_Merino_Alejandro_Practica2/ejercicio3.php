<?php
    function comprobarEstado(int $ejemplares) : string{
        $estado = match (true) {
            $ejemplares == 0 => "extinto",
            $ejemplares > 0 && $ejemplares <= 500 => "en peligro crítico",
            $ejemplares > 500 && $ejemplares <= 2000 => "en peligro",
            $ejemplares > 2000 => "amenazado"
        };
        return $estado;
    }

    function buscar(array $animales, string $busqueda) : string{
        foreach ($animales as $animal){
            list($especie,$clase,$numero) = $animal;
            if ($especie == $busqueda){
                return " esta " . comprobarEstado($numero);
            }
        }
        return " es un animal no contenido en la lista";
    }


?>