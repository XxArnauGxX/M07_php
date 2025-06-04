<?php

$valor = 5;
$array = array(1, 2, 3, 4, 5);

foreach ($array as $a) {
    if ($a === $valor) {
        $arrayNuevo = array_diff($array, [$a]);
    }
}

echo var_dump($arrayNuevo);
