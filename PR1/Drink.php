<?php

class Drink extends Expendable implements Naming
{
    protected bool $isAlcoholic;
    protected float $volume;

    public function __construct(string $name, float $weight, float $price, bool $isNew, string $expireDate, float $tax, bool $isAlcoholic, float $volume)
    {
        parent::__construct($name, $weight, $price, $isNew, $expireDate, $tax);
        $this->isAlcoholic = $isAlcoholic;
        if ($this->isAlcoholic) {
            $this->tax = 21;
        }
        $this->volume = $volume;
    }

    public function __toString(): string
    {
        return "Name: {$this->name}, Weight: {$this->weight}kg, Price: {$this->price}€, Is new: " . ($this->isNew ? 'true' : 'false') . ", Expire date: {$this->expireDate->format('Y-m-d')}, Tax: {$this->tax}, Alcoholic: " . ($this->isAlcoholic ? 'true' : 'false') . ", Volume: {$this->volume}";
    }

    public function toLiters(): float {
        return $this->volume / 1000;
    }

    public function toGallons(): float {
        return $this->volume / 4546.09;
    }

    public function getExpireDate(): DateTime
    {
        return $this->expireDate;
    }

    public function setExpireDate(DateTime $expireDate): void
    {
        $this->expireDate = $expireDate;
    }

    public function getTax(): float
    {
        return $this->tax;
    }

    public function setTax(float $tax): void
    {
        $this->tax = $tax;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getWeight(): float
    {
        return $this->weight;
    }
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    public function getIsNew(): bool
    {
        return $this->isNew;
    }
    public function setIsNew(bool $isNew): void
    {
        $this->isNew = $isNew;
    }

    public function getIsAlcoholic(): bool {
        return $this->isAlcoholic;
    }

    public function setIsAlcoholic(bool $isAlcoholic): void {
        $this->isAlcoholic = $isAlcoholic;
    }

    public function getVolume(): float {
        return $this->volume;
    }

    public function setVolume(float $volume): void {
        $this->volume = $volume;
    }

}
