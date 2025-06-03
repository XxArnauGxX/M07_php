<?php

$url = "https://gracia.sallenet.org/login/index.php";

$protocolo = parse_url($url, PHP_URL_SCHEME);

$ruta = parse_url($url, PHP_URL_PATH);

$extension = pathinfo($ruta, PATHINFO_EXTENSION);

echo $protocolo . " y " . $extension;
