<?php

function suma($num1, $num2)
{
    return $num1 + $num2;
}

function resta($num1, $num2)
{
    return $num1 - $num2;
}

function multiplicacion($num1, $num2)
{
    return $num1 * $num2;
}

function division($num1, $num2)
{
    if ($num1 === 0 || $num2 === 0) {
        echo "No se puede dividir con 0";
        return;
    } else {
        return $num1 / $num2;
    }
}

echo suma(4, 5);
echo "<br>";
echo resta(5, 1);
echo "<br>";
echo multiplicacion(18, 4);
echo "<br>";
echo division(4, 0);
echo "<br>";
echo division(0, 5);
echo "<br>";
echo division(27, 9);
