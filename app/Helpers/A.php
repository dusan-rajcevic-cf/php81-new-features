<?php

namespace App\Helpers;

class A implements Contract, Signature
{
    public function print(): string
    {
        return 'A';
    }
}
