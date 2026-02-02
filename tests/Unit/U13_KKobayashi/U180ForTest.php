<?php

namespace Tests\Unit\U13_KKobayashi;

use PHPUnit\Framework\TestCase;

class U180ForTest extends TestCase
{
    public function test_180_010(): void
    {
        $actual = 1;
        $actual++;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_180_020(): void
    {
        $actual = 2;
        $actual++;
        $actual++;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // for
    // https://www.php.net/manual/ja/control-structures.for.php
    public function test_180_030(): void
    {
        $actual = [];

        for ($i = 0; $i < 3; $i++) {
            $actual[] = $i;
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_180_040(): void
    {
        $actual = [];

        for ($i = 0; $i <= 3; $i++) {
            $actual[] = $i;
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_180_050(): void
    {
        $actual = 1;
        $actual += 2;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_180_060(): void
    {
        $actual = 1;
        $actual += 2;
        $actual += 2;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_180_070(): void
    {
        $actual = [];

        for ($i = 0; $i < 6; $i += 2) {
            $actual[] = $i;
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_180_080(): void
    {
        $actual = [];

        for ($i = 0; $i <= 6; $i += 2) {
            $actual[] = $i;
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // while
    // https://www.php.net/manual/ja/control-structures.while.php
    public function test_180_090(): void
    {
        $actual = [];
        $i = 0;

        while ($i < 3) {
            $actual[] = $i;
            $i++;
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_180_100(): void
    {
        $actual = [];
        $i = 0;

        while ($i < 6) {
            $actual[] = $i;
            $i += 2;
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_180_110(): void
    {
        $actual = [];
        $i = 0;

        while ($i <= 6) {
            $actual[] = $i;
            $i += 2;
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_180_120(): void
    {
        $actual = [];
        $i = 1;

        while ($i <= 10) {
            $actual[] = $i;
            $i += $i;
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // continue
    // https://www.php.net/manual/ja/control-structures.continue.php
    public function test_180_130(): void
    {
        $actual = [];

        for ($i = 0; $i <= 5; $i++) {
            if ($i == 3) {
                continue;
            }
            $actual[] = $i;
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_180_140(): void
    {
        $actual = [];

        for ($i = 0; $i <= 5; $i++) {
            if ($i <  3) {
                continue;
            }
            $actual[] = $i;
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // break
    // https://www.php.net/manual/ja/control-structures.break.php
    public function test_180_150(): void
    {
        $actual = [];

        for ($i = 0; $i <= 5; $i++) {
            if ($i == 4) {
                break;
            }
            $actual[] = $i;
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_180_160(): void
    {
        $actual = [];

        for ($i = 0; $i <= 5; $i++) {
            if ($i > 3) {
                break;
            }
            $actual[] = $i;
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }
}

