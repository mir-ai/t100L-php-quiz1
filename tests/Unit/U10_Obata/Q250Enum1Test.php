<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;

// 列挙型 / Enum
// https://www.php.net/manual/ja/language.types.enumerations.php
Enum Weather: int
{
    case Hare   = 1;
    case Kumori = 2;
    case Ame    = 3;
}

class Q250Enum1Test extends TestCase
{
    public function test_250_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public function test_250_020_enum1(): void
    {
        $r = Weather::Hare->value;
        $a = 1;

        $this->assertSame($a, $r);
    }

    public function test_250_020_enum2(): void
    {
        $r = Weather::TryFrom(1);
        $a = Weather::Hare;

        $this->assertSame($a, $r);
    }

    public function test_250_020_enum3(): void
    {
        $r = Weather::Hare->value;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_250_020_enum4(): void
    {
        $r = Weather::TryFrom(1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }
}

