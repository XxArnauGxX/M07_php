<?php

require_once 'Naming.php';
require_once 'Expendable.php';

class Food extends Expendable implements Naming
{
    public array $type;
    public function __construct(DateTime $expireDate, float $tax, array $type)
    {
        parent::__construct($expireDate, $tax);

        foreach ($type as $t) {
            if (!is_string($t)) {
                throw new InvalidArgumentException('Debe ser un string');
            }
        }
        $this->type = $type;
    }

    public function __toString(): string
    {
        $formattedDate = $this->expireDate->format('Y-m-d');
        $typesString = implode(',', $this->type);

        return "Expire date: $formattedDate, Tax: {$this->tax}, Types: $typesString";
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

    public function getType(): array
    {
        return $this->type;
    }

    public function setType(array $type): void
    {
        foreach ($type as $t) {
            if (!is_string($t)) {
                throw new InvalidArgumentException('Debe ser un string');
            }
        }

        $this->type = $type;
    }
}
