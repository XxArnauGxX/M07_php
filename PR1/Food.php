<?php

require_once 'Naming.php';
require_once 'Expendable.php';

class Food extends Expendable implements Naming
{
    public array $type;
    public function __construct(DateTime $expireDate, float $tax, array $type)
    {
        parent::__construct($expireDate, $tax);
        $this->type = $type;
    }
}
