<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

// 列挙型 / Enum
// https://www.php.net/manual/ja/language.types.enumerations.php
Enum Weather: int
{
    case Hare   = 1;
    case Kumori = 2;
    case Ame    = 3;
}

class U250Enum1Test extends TestCase
{
    public function test_250_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }
    
    public function test_250_020_enum1(): void
    {
        $actual = Weather::Hare->value;
        $expected = 1;

        $this->assertSame($expected, $actual);
    }

    public function test_250_020_enum2(): void
    {
        $actual = Weather::TryFrom(1);
        $expected = Weather::Hare;

        $this->assertSame($expected, $actual);
    }

    public function test_250_020_enum3(): void
    {
        $actual = Weather::Hare->value;

        // QUIZ
        $expected = 1;
        // /QUIZ        

        $this->assertSame($expected, $actual);
    }

    public function test_250_020_enum4(): void
    {
        $actual = Weather::TryFrom(1);

        // QUIZ
        $expected = Weather::Hare;
        // /QUIZ        

        $this->assertSame($expected, $actual);
    }
}

