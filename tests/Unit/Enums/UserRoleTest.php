<?php

namespace Tests\Unit\Enums;

use App\Enums\UserRole;
use Tests\TestCase;
use ValueError;

class UserRoleTest extends TestCase
{
    public function test_basic(): void
    {
        $this->assertEquals('ADMIN', UserRole::ADMIN->name);
        $this->assertEquals('MANAGER', UserRole::MANAGER->name);
        $this->assertEquals('VISITOR', UserRole::VISITOR->name);
    }

    public function test_backed(): void
    {
        $this->assertEquals('admin', UserRole::ADMIN->value);
        $this->assertEquals('manager', UserRole::MANAGER->value);
        $this->assertEquals('visitor', UserRole::VISITOR->value);
    }

    public function test_allows_defined_value(): void
    {
        $userAdmin = UserRole::from('admin');
        $this->assertEquals('admin', $userAdmin->value);
        $userManager = UserRole::from('manager');
        $this->assertEquals('manager', $userManager->value);
        $userVisitor = UserRole::from('visitor');
        $this->assertEquals('visitor', $userVisitor->value);
    }

    public function test_does_not_allow_undefined_values(): void
    {
        $undefined = 'editor';
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage('"'. $undefined . '" is not a valid backing value for enum ' . UserRole::class);

        $user = UserRole::from($undefined);
    }

    public function test_type(): void
    {
        $userRole = UserRole::ADMIN;

        $this->assertTrue($userRole instanceof UserRole);
    }

    public function test_instance_method_print_value(): void
    {
        $printValue = UserRole::ADMIN->printValue();

        $this->assertEquals('Administrator', $printValue);
    }

    public function test_static_method_random(): void
    {
        $random = UserRole::random();

        $this->assertTrue($random instanceof UserRole);
    }

    public function test_const_default(): void
    {
        $this->assertEquals(UserRole::VISITOR, UserRole::Default);
    }
}
