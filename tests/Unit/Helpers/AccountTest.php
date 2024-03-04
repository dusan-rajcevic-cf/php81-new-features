<?php

namespace Tests\Unit\Helpers;

use App\Helpers\Account;
use App\Helpers\Brand;
use Tests\TestCase;

class AccountTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testGetDefaultBrand(): void
    {
        $account = new Account('test');
        $this->assertEquals('test', $account->getBrand()->name);
    }

    public function testGetCustomBrand(): void
    {
        $account = new Account('custom', new Brand('custom'));
        $this->assertEquals('custom', $account->getBrand()->name);
    }
}
