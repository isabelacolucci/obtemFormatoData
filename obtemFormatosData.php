<?php

function obtemFormatosData($string){
    $length = strlen($string);
    $colchete = '[';
    $colchete2 = ']';
    $barra = '/';
    $formatoPlan = '';
    $formatoCSV = '';
    $proximo = 'D';

    for($i = 0; $i < $length; $i++) {

        $showString_i = substr($string, $i, 1);

        if (is_numeric($showString_i)) {
            $formatoPlan = $formatoPlan . $proximo;

        } elseif ($colchete == $showString_i) {
            $formatoPlan = $formatoPlan . $colchete;
            
        } elseif ($colchete2 == $showString_i) {
            $formatoPlan = $formatoPlan . $colchete2;
            
        } elseif ($barra == $showString_i) {
            $formatoPlan = $formatoPlan . $barra;

            if ($proximo == 'D') {
                $proximo = 'M';
            }
            elseif ($proximo == 'M') {
                $proximo = 'Y';
            }
        }
    }

    for($i = 0; $i < $length; $i++) {
        $showString_i = substr($formatoPlan, $i, 1);

        if ($colchete == $showString_i) {
            $formatoCSV = $colchete2 . $formatoCSV;
            
        } elseif ($colchete2 == $showString_i) {
            $formatoCSV = $colchete . $formatoCSV;
            
        } elseif ($barra == $showString_i) {
            $formatoCSV = '-' . $formatoCSV;

        } else {
            $formatoCSV = $showString_i . $formatoCSV;

        }
    }

    $formatos = array('formatoPlan' => $formatoPlan, 'formatoCSV' => $formatoCSV);

    return $formatos;
}

?>