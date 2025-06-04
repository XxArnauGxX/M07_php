<?php

$arrayMultidimensional = array(
    ['Tokyo', 'Japan', 'Asia'],
    ['Mexico City', 'Mexico', 'North America'],
    ['New York City', 'USA', 'North America'],
    ['Mumbai', 'India', 'Asia'],
    ['Seoul', 'Korea', 'Asia'],
    ['Shangai', 'China', 'Asia'],
    ['Chicago', 'USA', 'North America'],
    ['Buenos Aires', 'Argentina', 'South America'],
    ['Cairo', 'Egypt', 'Africa'],
    ['London', 'UK', 'Europe']
);

$contadorNorthAmerica = 0;
$contadorUSA = 0;

foreach ($arrayMultidimensional as $country) {
    if ($country[1] === 'USA') {
        $contadorUSA++;
    }
}

foreach ($arrayMultidimensional as $continent) {
    if ($continent[2] === 'North America') {
        $contadorNorthAmerica++;
    }
}

echo "Contador de USA: $contadorUSA" . "<br>";
echo "Contador NorthAmerica: $contadorNorthAmerica";
