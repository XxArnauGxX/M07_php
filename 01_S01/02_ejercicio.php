<?php

$userAgent = $_SERVER["HTTP_USER_AGENT"] ?? "No definido";
$host = $_SERVER["HTTP_HOST"] ?? "No definido";

echo "User Agent: " . htmlspecialchars($userAgent) . "<br>";
echo "Host: " . htmlspecialchars($host);
