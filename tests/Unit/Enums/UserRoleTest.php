<?php

namespace Tests\Unit\Enums;

use App\Enums\UserRole;
use Tests\TestCase;

class UserRoleTest extends TestCase
{
    public function test_basic(): void
    {
        $this->assertEquals('ADMIN', UserRole::ADMIN->name);
        $this->assertEquals('MANAGER', UserRole::MANAGER->name);
        $this->assertEquals('VISITOR', UserRole::VISITOR->name);
    }
}
