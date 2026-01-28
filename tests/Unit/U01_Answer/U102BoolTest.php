<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U102BoolTest extends TestCase
{
    public function test_u100100(): void
    {
        $r = true;
        $r = ! $r;
        $this->assertFalse($r);
    }

    public function test_u100101(): void
    {
        $r = false;
        $r = ! $r;
        $this->assertTrue($r);
    }

    public function test_u100102(): void
    {
        $r = true && true;
        $this->assertTrue($r);
    }

    public function test_u100103(): void
    {
        $r = true && false;
        $this->assertFalse($r);
    }

    public function test_u100104(): void
    {
        $r = true || true;
        $this->assertTrue($r);
    }

    public function test_u100105(): void
    {
        $r = true || false;
        $this->assertTrue($r);
    }

    public function test_u100106(): void
    {
        $r = false || true;
        $this->assertTrue($r);
    }

    public function test_u100107(): void
    {
        $r = false || false;
        $this->assertFalse($r);
    }
}

