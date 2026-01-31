<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;

class Q130MathTest extends TestCase
{
    public function test_130_010(): void
    {
        $r = 1 + 1;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_130_020(): void
    {
        $r = 1 - 1;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_130_030(): void
    {
        $r = 1 * 2;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_130_040(): void
    {
        $r = 4 / 2;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_130_050(): void
    {
        $r = 4 % 3;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_130_060(): void
    {
        $r = 5 % 3;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_130_070(): void
    {
        $r = 6 % 3;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_130_080(): void
    {
        $r = 1;
        $r++;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_130_090(): void
    {
        $r = 2;
        $r--;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_130_100(): void
    {
        $r = 1;
        $r += 2;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_130_110(): void
    {
        $r = 3;
        $r -= 2;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }


}

