<?php

function sumaDeTodos()
{
    $resultado = 0;
    for ($i = 1; $i <= 100; $i++) {
        $resultado = $resultado + $i;
    }
    return $resultado;
}

echo sumaDeTodos();
