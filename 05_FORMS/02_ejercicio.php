<?php

function calculaSuma($array)
{
    return array_sum($array);
}

function ordenaArray($array)
{
    if (is_numeric($array[0])) {
        sort($array, SORT_NUMERIC);
    } else {
        sort($array, SORT_STRING);
    }
    return $array;
}

$ingresos = isset($_GET['ingresos']) ? explode("-", $_GET['ingresos']) : [];
$ventas = isset($_GET['ventas']) ? explode("-", $_GET["ventas"]) : [];

$sumaIngresos = calculaSuma($ingresos);
$ventasOrdenadas = ordenaArray($ventas);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Informe Mensual</title>
    <style>
        .recuadro {
            border: 2px solid #333;
            padding: 20px;
            width: 400px;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }

        .titulo {
            font-size: 2em;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .detalle {
            font-size: 1.1em;
            margin-left: 15px;
        }
    </style>
</head>

<body>
    <div class="recuadro">
        <div class="titulo">Informe Mensual</div>
        <div class="detalle">
            - La suma de ingresos totales es: <br><?php echo $sumaIngresos; ?></b><br>
            - Las ventas de este mes han sido: <b><?php echo implode(", ", $ventasOrdenadas); ?></b>
        </div>
    </div>
</body>

</html>