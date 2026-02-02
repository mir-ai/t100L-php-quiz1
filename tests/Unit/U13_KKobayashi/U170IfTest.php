<?php

namespace Tests\Unit\U13_KKobayashi;

use PHPUnit\Framework\TestCase;

class U170IfTest extends TestCase
{
    public function test_170_010(): void
    {
        $actual = [];
        $actual[] = 'a';
        $actual[] = 'b';
        $actual[] = 'c';

        $this->assertSame(['a', 'b', 'c'], $actual);
    }

    public function test_170_020(): void
    {
        $actual = [];
        $actual[] = 'a';

        if (1 == 1) {
            $actual[] = 'b';
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // if
    // https://www.php.net/manual/ja/control-structures.if.php
    public function test_170_030(): void
    {
        $actual = [];
        $actual[] = 'a';

        if (1 != 1) {
            $actual[] = 'b';
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_170_040(): void
    {
        $actual = [];
        $actual[] = 'a';

        if (1 == 1) {
            $actual[] = 'b';
        } else {
            $actual[] = 'c';
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_170_050(): void
    {
        $actual = [];
        $actual[] = 'a';

        if (1 != 1) {
            $actual[] = 'b';
        } else {
            $actual[] = 'c';
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_170_060(): void
    {
        $actual = [];
        $actual[] = 'a';

        if (2 == 1) {
            $actual[] = 'b';
        } else if (2 == 2) {
            $actual[] = 'c';
        } else {
            $actual[] = 'd';
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // match
    // https://www.php.net/manual/ja/control-structures.match.php
    public function test_170_070(): void
    {
        $actual = [];
        $actual[] = 'a';

        $actual[] = match(1) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_170_080(): void
    {
        $actual = [];
        $actual[] = 'a';

        $actual[] = match(3) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_170_090(): void
    {
        $actual = [];
        $actual[] = 'a';

        $actual[] = match(5) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_170_100(): void
    {
        $i  = 2;

        $actual = [];
        $actual[] = 'a';

        $actual[] = match($i) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }
}

