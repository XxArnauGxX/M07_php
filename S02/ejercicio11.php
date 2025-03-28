<?php

function valorMasLargo($array)
{
    if (empty($array)) {
        echo "El array esta vacío.";
        return;
    }

    $masLargo = "";

    foreach ($array as $valor) {
        if (strlen($valor) > strlen($masLargo)) {
            $masLargo = $valor;
        }
    }

    echo "El valor más largo es: $masLargo";
}

$palabras = ["casa", "elefante", "gato", "transporte", "sol"];
valorMasLargo($palabras);
