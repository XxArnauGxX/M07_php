<?php

class Drink extends Expendable implements Naming
{
    public bool $isAlcoholic;
    public float $volume;

    public function __construct(DateTime $expireDate, float $tax, string $name, float $weight, float $price, bool $isNew, bool $isAlcoholic, float $volume)
    {
        parent::__construct($expireDate, $tax, $name, $weight, $price, $isNew);
        $this->volume = $volume;

        if ($this->isAlcoholic === true) {
            $tax = 21;
        }

        $this->isAlcoholic = $isAlcoholic;
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
        return $this->IsAlcoholic;
    }

    public function setIsAlcoholic($isAlcoholic): void {
        $this->IsAlcoholic = $isAlcoholic;
    }

    public function getVolume(): float {
        return $this->volume;
    }

    public function setVolume($volume): void {
        $this->volume = $volume;
    }

}
