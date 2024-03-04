<?php

namespace App\Helpers;

class Intersect
{
    public function __construct(private Contract&Signature $contract)
    {
    }

    public function printSignature(): string
    {
        return $this->contract->print();
    }
}
