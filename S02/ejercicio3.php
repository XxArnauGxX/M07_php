<?php

$url = "https://gracia.sallenet.org/login/index.php";

echo "Con la función de substr: " . substr($url, -9, 5) . "<br>";

$partes = explode("/", $url);
$archivo = end($partes);
$name = explode(".", $archivo);

foreach ($name as $n) {
    echo $n . "<br>";
}

echo "Con la función de explode: " . $name[0];
