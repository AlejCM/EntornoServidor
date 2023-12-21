<?php
    function sumatorio(int $num) : int | string{
        if ($num > 0){
            $suma = 0;
            for ($i = 1; $i <= $num; $i++){
                $suma += $i;
            }
            return $suma;
        }
        else{
            return "Error";
        }
    }

    function factorial(int $num) : int | string{
        if ($num >= 1){
            $res = 1;
            for ($i = 1; $i <= $num; $i++){
                $res *= $i;
            }
            return $res;
        }
        else{
            return 0;
        }
    }
?>