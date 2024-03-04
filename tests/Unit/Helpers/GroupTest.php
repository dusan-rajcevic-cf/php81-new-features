<?php
namespace Tests\Unit\Helpers;

use App\Helpers\Group;
use Error;
use Tests\TestCase;

class GroupTest extends TestCase
{
    public function test_callableToUpper(): void
    {
        $group = new Group('test');
        $callable = $group->callableToUpper();
        $this->assertSame('TEST', $callable('test'));
    }

    public function test_deprecatedToUpper_throws_error(): void
    {
        $group = new Group('test');
        $callable = $group->deprecatedToUpper();
        $this->expectException(Error::class);
        $this->expectExceptionMessage('Call to private method ' . Group::class . '::privateToUpper() from scope Tests\Unit\Helpers\GroupTest');
        $callable();
    }

    public function test_callableToUpperFromCallable(): void
    {
        $group = new Group('test');
        $callable = $group->callableToUpperFromCallable();
        $this->assertSame('TEST', $callable());
    }
}
