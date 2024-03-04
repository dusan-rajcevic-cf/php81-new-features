<?php

namespace App\Helpers;

class Account
{
    public function __construct(
        private readonly string $name,
        private readonly Brand $brand = new Brand('test')
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBrand(): Brand
    {
        return $this->brand;
    }
}
