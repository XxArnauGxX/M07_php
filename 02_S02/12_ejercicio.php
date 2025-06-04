<?php

function eliminarDuplicado($array)
{
    $arraySinDuplicados = [];
    foreach ($array as $valor) {
        if (!in_array($valor, $arraySinDuplicados)) {
            $arraySinDuplicados[] = $valor;
        }
    }
    return $arraySinDuplicados;
}

$numeros = array(1, 2, 3, 3, 4, 5, 6, 7, 7, 7, 8, 9, 10);
$resultado = eliminarDuplicado($numeros);
print_r($resultado);
