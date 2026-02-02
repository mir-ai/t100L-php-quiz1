<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U170IfTest extends TestCase
{
    public function test_170_010(): void
    {
        $actual = [];
        $r[] = 'a';
        $r[] = 'b';
        $r[] = 'c';

        $this->assertSame(['a', 'b', 'c'], $actual);
    }

    public function test_170_020(): void
    {
        $actual = [];
        $r[] = 'a';

        if (1 == 1) {
            $r[] = 'b';
        }

        // QUIZ
        $expected = ['a', 'b'];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // if
    // https://www.php.net/manual/ja/control-structures.if.php
    public function test_170_030(): void
    {
        $actual = [];
        $r[] = 'a';

        if (1 != 1) {
            $r[] = 'b';
        }

        // QUIZ
        $expected = ['a'];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_170_040(): void
    {
        $actual = [];
        $r[] = 'a';

        if (1 == 1) {
            $r[] = 'b';
        } else {
            $r[] = 'c';
        }

        // QUIZ
        $expected = ['a', 'b'];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_170_050(): void
    {
        $actual = [];
        $r[] = 'a';

        if (1 != 1) {
            $r[] = 'b';
        } else {
            $r[] = 'c';
        }

        // QUIZ
        $expected = ['a', 'c'];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_170_060(): void
    {
        $actual = [];
        $r[] = 'a';

        if (2 == 1) {
            $r[] = 'b';
        } else if (2 == 2) {
            $r[] = 'c';
        } else {
            $r[] = 'd';
        }

        // QUIZ
        $expected = ['a', 'c'];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // match
    // https://www.php.net/manual/ja/control-structures.match.php
    public function test_170_070(): void
    {
        $actual = [];
        $r[] = 'a';

        $r[] = match(1) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        // QUIZ
        $expected = ['a', 'b'];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_170_080(): void
    {
        $actual = [];
        $r[] = 'a';

        $r[] = match(3) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        // QUIZ
        $expected = ['a', 'd'];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_170_090(): void
    {
        $actual = [];
        $r[] = 'a';

        $r[] = match(5) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        // QUIZ
        $expected = ['a', 'e'];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_170_100(): void
    {
        $i  = 2;

        $actual = [];
        $r[] = 'a';

        $r[] = match($i) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        // QUIZ
        $expected = ['a', 'c'];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }
}

