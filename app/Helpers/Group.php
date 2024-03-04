<?php

namespace App\Helpers;

class Group
{
    public function __construct(private readonly string $name)
    {
    }

    private function privateToUpper(): string
    {
        $callable = $this->callableToUpper();

        return $callable($this->name);
    }

    public function callableToUpper(): callable
    {
        return mb_strtoupper(...);
    }

    public function deprecatedToUpper(): callable
    {
        return [$this, 'privateToUpper'];
    }

    public function callableToUpperFromCallable(): callable
    {
        return $this->privateToUpper(...);
    }
}
