<?php

$array = array('Amarillo', 'Rojo', 'Verde', 'Azul');

array_push($array, 'Morado');

$cadena = "";

foreach ($array as $key => $color) {
    $cadena = $cadena . $color;
    if ($key < count($array) - 1) {
        $cadena = $cadena . ", ";
    }
}

echo $cadena;
