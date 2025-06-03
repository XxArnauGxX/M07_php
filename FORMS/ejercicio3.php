<?php

$url = "https://gracia.sallenet.org/login/index.php";

$host = parse_url($url, PHP_URL_HOST);

$partes = explode('.', $host);

$tld = end($partes);

echo $tld;
