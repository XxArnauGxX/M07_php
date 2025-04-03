<?php

class Drink extends Expendable implements Naming
{
    public bool $isAlcoholic;
    public float $volume;

    public function __construct(DateTime $expireDate, float $tax, string $name, float $weight, float $price, bool $isNew, bool $isAlcoholic, float $volume)
    {
        parent::__construct($expireDate, $tax, $name, $weight, $price, $isNew);
        $this->isAlcoholic = $isAlcoholic;

        if ($this->isAlcoholic === true) {
            $tax = 21;
        }

        $this->tax = $tax;
    }
}
