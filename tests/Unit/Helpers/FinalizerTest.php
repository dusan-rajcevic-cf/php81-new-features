<?php

namespace Tests\Unit\Helpers;

use App\Helpers\Finalizer;
use Tests\TestCase;

class FinalizerTest extends TestCase
{
    private Finalizer $finalizer;

    public function setUp(): void
    {
        parent::setUp();
        $this->finalizer = new Finalizer();
    }

    public function testDumpAndDie(): void
    {
        $this->expectOutputString('test');

        $this->finalizer->dumpAndDie('test');
    }

    public function testDumpAndThrowException(): void
    {
        $this->expectExceptionMessage('test');
        $this->finalizer->dumpAndThrowException('test');
    }
}
