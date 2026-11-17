<?php

namespace Tests\Unit;

use App\Support\ShopRules;
use PHPUnit\Framework\TestCase;

class Anggota4WhiteBoxTest extends TestCase
{
    public function test_anggota_4_white_box(): void
    {
        // Kasus TC10-04: discount(-1, false), expected InvalidArgumentException
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Subtotal negatif');

        ShopRules::discount(-1, false);
    }
}
