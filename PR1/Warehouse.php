<?php

class Warehouse implements Naming {
    protected string $name;
    protected string $address;
    protected string $city;
    protected array $slots;
    protected int $maxX;
    protected int $maxY;

    public function __construct(string $name, string $address, string $city, int $maxX, int $maxY) {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->maxX = $maxX;
        $this->maxY = $maxY;
        $this->slots = array_fill(0, $maxX, array_fill(0, $maxY, null));

    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function __toString(): string {}

    public function add($item): void {
        foreach ($this->slots as $key => $slot) {
            if ($slot === null) {
                $this->slots[$key] = $item;
                return;
            }
        }
    }
}