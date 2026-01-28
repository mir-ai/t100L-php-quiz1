<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U106ConditionTest extends TestCase
{
    public function test_u100140(): void
    {
        $r = (true);

        $this->assertTrue($r);
    }

    public function test_u100141(): void
    {
        $r = (false);

        $this->assertFalse($r);
    }

    public function test_u100142(): void
    {
        $r = (1 == 1);

        $this->assertTrue($r);
    }

    public function test_u100143(): void
    {
        $r = (1 != 1);

        $this->assertFalse($r);
    }

    public function test_u100144(): void
    {
        $r = (1 == "1");

        $this->assertTrue($r);
    }

    public function test_u100145(): void
    {
        $r = (123 == "123");

        $this->assertTrue($r);
    }

    public function test_u100146(): void
    {
        $r = (1 === "1");

        $this->assertFalse($r);
    }

    public function test_u100147(): void
    {
        $r = (123 === "123");

        $this->assertFalse($r);
    }

    public function test_u100150(): void
    {
        $r = (1 == 1);

        $this->assertTrue($r);
    }

    public function test_u100151(): void
    {
        $r = (1 < 2);

        $this->assertTrue($r);
    }

    public function test_u100152(): void
    {
        $r = (1 <= 1);

        $this->assertTrue($r);
    }

    public function test_u100153(): void
    {
        $r = (1 <= 2);

        $this->assertTrue($r);
    }

    public function test_u100154(): void
    {
        $r = (1 != 2);

        $this->assertTrue($r);
    }

    public function test_u100155(): void
    {
        $r = (1 != 1);

        $this->assertFalse($r);
    }

    public function test_u100156(): void
    {
        $r = (1 != 1);

        $this->assertFalse($r);
    }

    public function test_u100157(): void
    {
        $r = (1 <> 1);

        $this->assertFalse($r);
    }
}

