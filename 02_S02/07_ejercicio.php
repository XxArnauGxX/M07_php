<?php

function fibonnacci($num1)
{
    $contador = 0;
    $array = array();
    $numeroAnterior = 0;
    $numeroPosterior = 1;

    array_push($array, $numeroAnterior);

    if ($num1 > 1) {
        array_push($array, $numeroPosterior);
    }

    do {
        $numeroActual = $numeroAnterior + $numeroPosterior;
        array_push($array, $numeroActual);

        $numeroAnterior = $numeroPosterior;
        $numeroPosterior = $numeroActual;

        $contador++;
    } while ($contador < $num1 - 2);

    foreach ($array as $a) {
        echo $a . "<br>";
    }
}

fibonnacci(6);
