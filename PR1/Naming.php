<?php

interface Naming
{
    public function getName(): string;
    public function setName(string $name): void;
    public function __toString(): string;
}
