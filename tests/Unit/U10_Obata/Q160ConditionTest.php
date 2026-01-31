<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;

class Q160ConditionTest extends TestCase
{
    public function test_160_010(): void
    {
        $r = (true);

        $this->assertSame(true, $r);
    }

    public function test_160_020(): void
    {
        $r = (false);

        $this->assertSame(false, $r);
    }

    public function test_160_030(): void
    {
        $r = (1 == 1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_040(): void
    {
        $r = (1 != 1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_050(): void
    {
        $r = (1 == "1");

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_060(): void
    {
        $r = (123 == "123");

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_070(): void
    {
        $r = (1 === "1");

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_080(): void
    {
        $r = (123 === "123");

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_090(): void
    {
        $r = (1 == 1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_100(): void
    {
        $r = (1 < 2);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_110(): void
    {
        $r = (1 <= 1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_120(): void
    {
        $r = (1 <= 2);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_130(): void
    {
        $r = (1 != 2);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_140(): void
    {
        $r = (1 != 1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_150(): void
    {
        $r = (1 != 1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_160(): void
    {
        $r = (1 <> 1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_160_170(): void
    {
        $r = '';
        $a = '';

        if (! $r) {
            $a = 'empty';
        } else {
            $a = 'not empty';
        }

        $this->assertSame('empty', $a);
    }

    public function test_160_180(): void
    {
        $r = 0;
        $a = '';

        if (! $r) {
            $a = 'empty';
        } else {
            $a = 'not empty';
        }

        $this->assertSame('empty', $a);
    }



}

