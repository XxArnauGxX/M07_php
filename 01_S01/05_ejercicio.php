<?php

$positivo = 34;
$negativo = -28;

if ($positivo > 0) {
    echo "Positivo";
    echo "<br>";
} elseif ($positivo < 0) {
    echo "Negativo";
    echo "<br>";
} else {
    echo "0";
    echo "<br>";
}

switch ($negativo) {
    case ($negativo > 0):
        echo "Positivo";
        echo "<br>";
        break;
    case ($negativo < 0):
        echo "Negativo";
        echo "<br>";
        break;
    case ($negativo = 0):
        echo "0";
        echo "<br>";
        break;
    default:
        echo "Error";
        echo "<br>";
        break;
}
