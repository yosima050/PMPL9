<?php

namespace Tests\Unit;

use App\Support\ShopRules;
use PHPUnit\Framework\TestCase;

class Anggota3WhiteBoxTest extends TestCase
{
    public function test_anggota_3_white_box(): void
    {
        // Kasus: subtotal di bawah 100000, non-member
        $actual = ShopRules::discount(50000, false);
        
        $this->assertSame(0, $actual);
    }
}