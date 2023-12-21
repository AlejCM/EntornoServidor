<?php
    function cambiarDivisas(float|int $dinero, string $div1, string $div2) : float{
        $cambio = match(true){
            $div1 == "E" && $div2 == "D" => 1.06,
            $div1 == "E" && $div2 == "Y" => 157.56,
            $div1 == "D" && $div2 == "E" => 0.94,
            $div1 == "D" && $div2 == "Y" => 148.73,
            $div1 == "Y" && $div2 == "E" => 0.0063,
            $div1 == "Y" && $div2 == "D" => 0.0067
        };
        return ($dinero * ($cambio));
    }



?>