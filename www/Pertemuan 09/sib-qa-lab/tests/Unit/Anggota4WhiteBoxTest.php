<?php

namespace Tests\Unit;

use App\Support\ShopRules;
use PHPUnit\Framework\TestCase;

class Anggota4WhiteBoxTest extends TestCase
{
    public function test_anggota_4_white_box(): void
    {
        // Kasus: tepat ambang, nonmember; Input: 100000, false
        $rules = new ShopRules();
        $discount = $rules->discount(100000, false);

        $this->assertEquals(5000, $discount); 
    }
}