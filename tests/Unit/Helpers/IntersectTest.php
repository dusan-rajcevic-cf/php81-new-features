<?php

namespace Tests\Unit\Helpers;

use App\Helpers\A;
use App\Helpers\B;
use App\Helpers\C;
use App\Helpers\Contract;
use App\Helpers\Intersect;
use App\Helpers\Signature;
use Tests\TestCase;
use TypeError;

class IntersectTest extends TestCase
{
    public function testProperIntersectTypes()
    {
        $intersectA = new Intersect(new A);

        $this->assertEquals('A', $intersectA->printSignature());

        $intersectC = new Intersect(new C);

        $this->assertEquals('C', $intersectC->printSignature());
    }

    public function testWrongIntersectTypes()
    {
        $contract = str_replace('\\', '\\\\', Contract::class);
        $signature = str_replace('\\', '\\\\', Signature::class);
        $intersect = str_replace('\\', '\\\\', Intersect::class);
        $b = str_replace('\\', '\\\\', B::class);
        $this->expectException(TypeError::class);
        $this->expectExceptionMessageMatches('/' . $intersect  . '::__construct\(\): Argument #1 \(\$contract\) must be of type ' . $contract . '&' . $signature . ', ' . $b . ' given, called in (.+?) on line \d+/');

        $intersectB = new Intersect(new B);
    }
}
