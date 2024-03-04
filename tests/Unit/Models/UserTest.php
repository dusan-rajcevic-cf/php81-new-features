<?php

namespace Tests\Unit\Models;

use App\Enums\UserRole;
use App\Models\User;
use Tests\TestCase;
use ValueError;

class UserTest extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_user_role_allows_defined_role_value(): void
    {
        $definedRole = 'admin';
        $this->user->role = $definedRole;
        $this->user->save();

        $this->assertEquals(UserRole::ADMIN, $this->user->role);
    }

    public function test_user_role_does_not_allow_undefined_role_values(): void
    {
        $missingRole = 'editor';
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage('"' . $missingRole . '" is not a valid backing value for enum ' . UserRole::class);
        $this->user->role = $missingRole;
    }
}
