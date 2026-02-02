<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U130MathTest extends TestCase
{
    // 算術演算子
    // https://www.php.net/manual/ja/language.operators.arithmetic.php
    public function test_130_010(): void
    {
        $actual = 1 + 1;

        // QUIZ
        $expected = 2;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_130_020(): void
    {
        $actual = 1 - 1;

        // QUIZ
        $expected = 0;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_130_030(): void
    {
        $actual = 1 * 2;

        // QUIZ
        $expected = 2;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_130_040(): void
    {
        $actual = 4 / 2;

        // QUIZ
        $expected = 2;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_130_050(): void
    {
        $actual = 4 % 3;

        // QUIZ
        $expected = 1;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_130_060(): void
    {
        $actual = 5 % 3;

        // QUIZ
        $expected = 2;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_130_070(): void
    {
        $actual = 6 % 3;

        // QUIZ
        $expected = 0;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_130_080(): void
    {
        $actual = 1;
        $actual++;

        // QUIZ
        $expected = 2;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }    

    public function test_130_090(): void
    {
        $actual = 2;
        $actual--;

        // QUIZ
        $expected = 1;
        // /QUIZ

        $this->assertSame($expected, $actual);
    } 
    
    public function test_130_100(): void
    {
        $actual = 1;
        $actual += 2;

        // QUIZ
        $expected = 3;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }    

    public function test_130_110(): void
    {
        $actual = 3;
        $actual -= 2;

        // QUIZ
        $expected = 1;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }    

    
}

