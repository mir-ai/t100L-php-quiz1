<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U103MathTest extends TestCase
{
    public function test_u100110(): void
    {
        $r = 1 + 1;
        $this->assertSame(2, $r);
    }

    public function test_u100111(): void
    {
        $r = 1 - 1;
        $this->assertSame(0, $r);
    }

    public function test_u100112(): void
    {
        $r = 1 * 2;
        $this->assertSame(2, $r);
    }

    public function test_u100113(): void
    {
        $r = 4 / 2;
        $this->assertSame(2, $r);
    }

    public function test_u100114(): void
    {
        $r = 4 % 3;
        $this->assertSame(1, $r);
    }

    public function test_u100115(): void
    {
        $r = 5 % 3;
        $this->assertSame(2, $r);
    }

    public function test_u100116(): void
    {
        $r = 5 % 3;
        $this->assertSame(2, $r);
    }

    public function test_u100117(): void
    {
        $r = 6 % 3;
        $this->assertSame(0, $r);
    }
}

