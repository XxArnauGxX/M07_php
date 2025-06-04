<?php

function verificar($valor)
{
    $contador = 0;
    $resultado = 0;

    if (!is_numeric($valor)) {
        echo "El valor no es un número<br>";
        return;
    }

    $digitos = str_split((string)$valor);

    foreach ($digitos as $digito) {
        $contador++;
        $resultado += (int)$digito;
    }

    echo "Cantidad de dígitos: " . $contador . "<br>";
    echo "Suma de los dígitos: " . $resultado . "<br>";
}

verificar("Hola");
verificar("123");
verificar(12345);
