<?php

namespace App\Enums;

trait PrintName
{
    public function printName(): string
    {
        return $this->name;
    }
}
