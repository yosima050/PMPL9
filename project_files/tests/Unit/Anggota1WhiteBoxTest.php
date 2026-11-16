<?php

namespace Tests\Unit;

use App\Support\ShopRules;
use PHPUnit\Framework\TestCase;

class Anggota1WhiteBoxTest extends TestCase
{
    public function test_anggota_1_white_box(): void
    {
        // Kasus TC10-01: discount(150000, true), expected 15000
        $actual = ShopRules::discount(150000, true);
        $this->assertSame(15000, $actual);
    }
}
