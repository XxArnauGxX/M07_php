<?php

require_once 'Warehouse.php';
require_once 'Food.php';
require_once 'Drink.php';
require_once 'NoExpendable.php';

// Crear un almacén
$warehouse = new Warehouse("Almacén Central", "Calle Principal 123", "Barcelona", 5, 5);

// Crear algunos productos
$food1 = new Food("Arroz", 1.0, 2.5, true, "2024-12-31", 10, ["cereales"]);
$food2 = new Food("Pan", 0.5, 1.2, true, "2024-03-15", 10, ["panadería"]);
$drink1 = new Drink("Cerveza", 0.5, 3.0, true, "2024-06-30", 21, true, 330);
$drink2 = new Drink("Agua", 1.0, 1.0, true, "2024-12-31", 10, false, 1000);
$noExpendable = new NoExpendable("Sartén", 1.5, 25.0, true, new DateTime());

// Añadir productos al almacén
$warehouse->add($food1);
$warehouse->add($food2);
$warehouse->add($drink1);
$warehouse->add($drink2);
$warehouse->add($noExpendable);

// Probar diferentes métodos
echo "=== Inventario inicial ===\n";
$warehouse->printInventory();

echo "\n=== Búsqueda por tipo de comida ===\n";
$result = $warehouse->searchByType("cereales");
print_r($result);

echo "\n=== Cálculo de litros totales ===\n";
$warehouse->calculateTotalLiters();

echo "\n=== Items que caducan entre fechas ===\n";
$warehouse->findExpiringBetweenDates(
    new DateTime('2024-03-01'),
    new DateTime('2024-07-01')
);

echo "\n=== Precio promedio de items ===\n";
echo "Precio promedio: €" . number_format($warehouse->avgPriceItems(), 2) . "\n";

echo "\n=== Ordenar almacén ===\n";
$warehouse->order();
$warehouse->printInventory();
