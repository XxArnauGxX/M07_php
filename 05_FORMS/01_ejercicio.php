<?php

$notas1aEvaluacion = [];
for ($i = 0; $i < 10; $i++) {
    $notas1aEvaluacion[] = rand(0, 10);
}

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}

switch ($accion) {
    case 'promedio':
        $promedio = array_sum($notas1aEvaluacion) / count($notas1aEvaluacion);
        echo "El promedio de las notas es: $promedio";
        break;
    case 'minimo':
        $minimo = min($notas1aEvaluacion);
        echo "La nota mínima es: $minimo";
        break;
    case 'máximo':
        $maximo = max($notas1aEvaluacion);
        echo "La nota máxima es: $maximo";
        break;
    default:
        echo "Acción incorrecta";
        break;
}
