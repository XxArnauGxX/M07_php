<?php

require_once 'Naming.php';

class Warehouse implements Naming
{
    protected string $name;
    protected string $address;
    protected string $city;
    protected array $slots;
    protected int $maxX;
    protected int $maxY;

    public function __construct(string $name, string $address, string $city, int $maxX, int $maxY)
    {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->maxX = $maxX;
        $this->maxY = $maxY;
        $this->slots = array_fill(0, $maxX, array_fill(0, $maxY, null));
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __toString(): string
    {
        return "Almacén: {$this->name}\nDirección: {$this->address}\nCiudad: {$this->city}\nDimensiones: {$this->maxX}x{$this->maxY}";
    }

    public function add($item): void
    {
        for ($x = 0; $x < $this->maxX; $x++) {
            for ($y = 0; $y < $this->maxY; $y++) {
                if ($this->slots[$x][$y] === null) {
                    $this->slots[$x][$y] = $item;
                    return;
                }
            }
        }
    }

    public function remove($posX, $posY): void
    {
        if ($posX < 0 || $posX >= $this->maxX || $posY < 0 || $posY >= $this->maxY) {
            echo "El array no tiene estas coordenadas";
            return;
        }


        $position = $this->slots[$posX][$posY];
        if ($position === null) {
            return;
        }
        $this->slots[$posX][$posY] = null;
    }

    public function removeBlanks(): void
    {
        $items = [];
        foreach ($this->slots as $x => $row) {
            foreach ($row as $y => $item) {
                if ($item !== null) {
                    $items[] = $item;
                    $this->slots[$x][$y] = null;
                }
            }
        }

        foreach ($items as $item) {
            $this->add($item);
        }
    }

    public function search(string $name): array
    {
        $count = 0;
        $items = [];

        foreach ($this->slots as $row) {
            foreach ($row as $item) {
                if ($item !== null && $item->getName() === $name) {
                    $count++;
                    $items[] = $item;
                }
            }
        }

        return ['count' => $count, 'items' => $items];
    }

    public function searchByType(string ...$types): array
    {
        $count = 0;
        $items = [];

        foreach ($this->slots as $row) {
            foreach ($row as $item) {
                if ($item instanceof Food) {
                    $itemTypes = $item->getType();
                    if (count(array_intersect($types, $itemTypes)) === count($types)) {
                        $count++;
                        $items[] = $item;
                    }
                }
            }
        }

        return ['count' => $count, 'items' => $items];
    }

    public function searchExpired(int $days = 0): void
    {
        $date = new DateTime();
        if ($days > 0) {
            $date->modify("+$days days");
        }

        for ($x = 0; $x < $this->maxX; $x++) {
            for ($y = 0; $y < $this->maxY; $y++) {
                $item = $this->slots[$x][$y];
                if ($item instanceof Expendable && method_exists($item, 'getExpireDate')) {
                    if ($days > 0) {
                        if ($item->getExpireDate() <= $date) {
                            $this->remove($x, $y);
                        }
                    } else if ($item->isExpired()) {
                        $this->remove($x, $y);
                    }
                }
            }
        }
    }

    public function cleanWarehouse(): void
    {
        for ($x = 0; $x < $this->maxX; $x++) {
            for ($y = 0; $y < $this->maxY; $y++) {
                $this->remove($x, $y);
            }
        }
    }

    public function sumPriceItems(): float
    {
        $total = 0;
        foreach ($this->slots as $row) {
            foreach ($row as $item) {
                if ($item !== null) {
                    $total += $item->calcPriceWithTax();
                }
            }
        }
        return $total;
    }

    public function avgPriceItems(): float
    {
        $count = 0;
        $total = 0;

        foreach ($this->slots as $row) {
            foreach ($row as $item) {
                if ($item !== null) {
                    $total += $item->calcPriceWithTax();
                    $count++;
                }
            }
        }

        return $count > 0 ? $total / $count : 0;
    }

    public function printInventory(): void
    {
        echo "Inventario del Almacén {$this->name}:\n";
        echo "Ubicación: {$this->address}, {$this->city}\n\n";

        for ($x = 0; $x < $this->maxX; $x++) {
            for ($y = 0; $y < $this->maxY; $y++) {
                $item = $this->slots[$x][$y];
                if ($item !== null) {
                    echo "Posición [$x][$y]: " . $item->__toString() . "\n";
                }
            }
        }
    }

    public function calculateTotalLiters(): void
    {
        $totalLiters = 0;
        $alcoholicLiters = 0;
        $nonAlcoholicLiters = 0;

        foreach ($this->slots as $row) {
            foreach ($row as $item) {
                if ($item instanceof Drink) {
                    $liters = $item->toLiters();
                    $totalLiters += $liters;

                    if ($item->getIsAlcoholic()) {
                        $alcoholicLiters += $liters;
                    } else {
                        $nonAlcoholicLiters += $liters;
                    }
                }
            }
        }

        $alcoholicPercentage = $totalLiters > 0 ? ($alcoholicLiters / $totalLiters) * 100 : 0;
        $nonAlcoholicPercentage = $totalLiters > 0 ? ($nonAlcoholicLiters / $totalLiters) * 100 : 0;

        echo "Total de litros: {$totalLiters}L\n";
        echo "Bebidas alcohólicas: " . number_format($alcoholicPercentage, 2) . "%\n";
        echo "Bebidas no alcohólicas: " . number_format($nonAlcoholicPercentage, 2) . "%\n";
    }

    public function findExpiringBetweenDates(DateTime $start, DateTime $end): void
    {
        echo "Items que caducan entre {$start->format('Y-m-d')} y {$end->format('Y-m-d')}:\n";

        for ($x = 0; $x < $this->maxX; $x++) {
            for ($y = 0; $y < $this->maxY; $y++) {
                $item = $this->slots[$x][$y];
                if ($item instanceof Expendable && method_exists($item, 'getExpireDate')) {
                    $expireDate = $item->getExpireDate();
                    if ($expireDate >= $start && $expireDate <= $end) {
                        echo "Posición [$x][$y]: {$item->getName()}\n";
                    }
                }
            }
        }
    }

    public function order(): void
    {
        $items = [];

        for ($x = 0; $x < $this->maxX; $x++) {
            for ($y = 0; $y < $this->maxY; $y++) {
                if ($this->slots[$x][$y] !== null) {
                    $items[] = $this->slots[$x][$y];
                    $this->slots[$x][$y] = null;
                }
            }
        }

        usort($items, function ($a, $b) {
            return get_class($a) <=> get_class($b);
        });

        $x = 0;
        $y = 0;
        foreach ($items as $item) {
            $this->slots[$x][$y] = $item;
            $y++;
            if ($y >= $this->maxY) {
                $y = 0;
                $x++;
            }
            if ($x >= $this->maxX) {
                break;
            }
        }
    }
}
