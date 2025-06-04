<?php

$numero = 22221;
$resultadoSuma = 0;
$resultadoMultiplicacion = 1;

$cifras = str_split((string)$numero);

foreach ($cifras as $cifra) {
    $resultadoSuma += $cifra;
    $resultadoMultiplicacion *= $cifra;
}

$string = strval($numero);

if ($string === strrev($string)) {
    echo "Es cap i cua" . "<br>";
} else {
    echo "No es cap i cua" . "<br>";
}

echo var_dump($resultadoSuma) . "<br>";
echo var_dump($resultadoMultiplicacion);
