<?php

namespace App\Helpers;

class Brand
{
    public function __construct(
        private readonly string $name
    ) {
    }

    public function __get($name): ?string
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return null;
    }
}
