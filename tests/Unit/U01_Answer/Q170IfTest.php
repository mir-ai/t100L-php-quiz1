<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class Q170IfTest extends TestCase
{
    public function test_170_010(): void
    {
        $r = [];
        $r[] = 'a';
        $r[] = 'b';
        $r[] = 'c';

        $this->assertSame(['a', 'b', 'c'], $r);
    }

    public function test_170_020(): void
    {
        $r = [];
        $r[] = 'a';

        if (1 == 1) {
            $r[] = 'b';
        }

        // QUIZ
        $a = ['a', 'b'];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_170_030(): void
    {
        $r = [];
        $r[] = 'a';

        if (1 != 1) {
            $r[] = 'b';
        }

        // QUIZ
        $a = ['a'];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_170_040(): void
    {
        $r = [];
        $r[] = 'a';

        if (1 == 1) {
            $r[] = 'b';
        } else {
            $r[] = 'c';
        }

        // QUIZ
        $a = ['a', 'b'];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_170_050(): void
    {
        $r = [];
        $r[] = 'a';

        if (1 != 1) {
            $r[] = 'b';
        } else {
            $r[] = 'c';
        }

        // QUIZ
        $a = ['a', 'c'];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_170_060(): void
    {
        $r = [];
        $r[] = 'a';

        if (2 == 1) {
            $r[] = 'b';
        } else if (2 == 2) {
            $r[] = 'c';
        } else {
            $r[] = 'd';
        }

        // QUIZ
        $a = ['a', 'c'];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_170_070(): void
    {
        $r = [];
        $r[] = 'a';

        $r[] = match(1) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        // QUIZ
        $a = ['a', 'b'];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_170_080(): void
    {
        $r = [];
        $r[] = 'a';

        $r[] = match(3) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        // QUIZ
        $a = ['a', 'd'];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_170_090(): void
    {
        $r = [];
        $r[] = 'a';

        $r[] = match(5) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        // QUIZ
        $a = ['a', 'e'];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_170_100(): void
    {
        $i  = 2;

        $r = [];
        $r[] = 'a';

        $r[] = match($i) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        // QUIZ
        $a = ['a', 'c'];
        // /QUIZ

        $this->assertSame($a, $r);
    }
}

