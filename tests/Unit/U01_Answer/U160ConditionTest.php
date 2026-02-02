<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

// 比較演算子
// https://www.php.net/manual/ja/language.operators.comparison.php
class U160ConditionTest extends TestCase
{
    public function test_160_010(): void
    {
        $actual = (true);

        $this->assertSame(true, $actual);
    }

    public function test_160_020(): void
    {
        $actual = (false);

        $this->assertSame(false, $actual);
    }

    public function test_160_030(): void
    {
        $actual = (1 == 1);

        // QUIZ
        $expected = true;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_040(): void
    {
        $actual = (1 != 1);

        // QUIZ
        $expected = false;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_050(): void
    {
        $actual = (1 == "1");

        // QUIZ
        $expected = true;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_060(): void
    {
        $actual = (123 == "123");

        // QUIZ
        $expected = true;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_070(): void
    {
        $actual = (1 === "1");

        // QUIZ
        $expected = false;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_080(): void
    {
        $actual = (123 === "123");

        // QUIZ
        $expected = false;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_090(): void
    {
        $actual = (1 == 1);

        // QUIZ
        $expected = true;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_100(): void
    {
        $actual = (1 < 2);

        // QUIZ
        $expected = true;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_110(): void
    {
        $actual = (1 <= 1);

        // QUIZ
        $expected = true;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_120(): void
    {
        $actual = (1 <= 2);

        // QUIZ
        $expected = true;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_130(): void
    {
        $actual = (1 != 2);

        // QUIZ
        $expected = true;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_140(): void
    {
        $actual = (1 != 1);

        // QUIZ
        $expected = false;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_150(): void
    {
        $actual = (1 != 1);

        // QUIZ
        $expected = false;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_160(): void
    {
        $actual = (1 <> 1);

        // QUIZ
        $expected = false;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_170(): void
    {
        $v = '';
        $actual = '';

        if (! $v) {
            $actual = 'empty';
        } else {
            $actual = 'not empty';
        }

        // QUIZ
        $expected = 'empty';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_160_180(): void
    {
        $v = 0;

        if (! $v) {
            $actual = 'empty';
        } else {
            $actual = 'not empty';
        }

        // QUIZ
        $expected = 'empty';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    

}

