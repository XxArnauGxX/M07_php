<?php

class NoExpendable extends Item implements Naming {
    public ?DateTime $warrantyDueDate = null;
    public DateTime $purchaseDate;
    public const TAX = 21;

    public function __construct(string $name, float $weight, float $price, bool $isNew, DateTime $purchaseDate) {
        parent::__construct($name, $weight, $price, $isNew);
        $this->purchaseDate = $purchaseDate;
    }

    public function __toString(): string {
        $warrantyDueDateString = $this->warrantyDueDate ? $this->warrantyDueDate->format('Y-m-d') : 'No Warranty';
        return "Name: {$this->name}, Weight: {$this->weight}kg, Price: {$this->price}€, Is new: " . ($this->isNew ? 'true' : 'false') . " Warranty Date: $warrantyDueDateString, Purchase Date: {$this->purchaseDate->format('Y-m-d')}";
    }

    public function fulfillWarranty(): void {
        $this->warrantyDueDate = $this->purchaseDate->modify('+2 years');
    }

    public function calcPriceWithTax(): float {
        $tax = self::TAX / 100;
        return $this->price + ($this->price * $tax);
    }

    public function getWarrantyDueDate(): ?DateTime {
        return $this->warrantyDueDate;
    }

    public function setWarrantyDueDate(?DateTime $warrantyDueDate): void {
        $this->warrantyDueDate = $warrantyDueDate;
    }

    public function getPurchaseDate(): DateTime {
        return $this->purchaseDate;
    }

    public function setPurchaseDate(DateTime $purchaseDate): void {
        $this->purchaseDate = $purchaseDate;
    }
}