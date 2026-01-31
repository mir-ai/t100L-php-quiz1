<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class Q180ForTest extends TestCase
{
    public function test_180_010(): void
    {
        $r = 1;
        $r++;

        // QUIZ
        $a = 2;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_020(): void
    {
        $r = 2;
        $r++;
        $r++;

        // QUIZ
        $a = 4;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_030(): void
    {
        $r = [];

        for ($i = 0; $i < 3; $i++) {
            $r[] = $i;
        }

        // QUIZ
        $a = [0, 1, 2];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_040(): void
    {
        $r = [];

        for ($i = 0; $i <= 3; $i++) {
            $r[] = $i;
        }

        // QUIZ
        $a = [0, 1, 2, 3];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_050(): void
    {
        $r = 1;
        $r += 2;

        // QUIZ
        $a = 3;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_060(): void
    {
        $r = 1;
        $r += 2;
        $r += 2;

        // QUIZ
        $a = 5;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_070(): void
    {
        $r = [];

        for ($i = 0; $i < 6; $i += 2) {
            $r[] = $i;
        }

        // QUIZ
        $a = [0, 2, 4];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_080(): void
    {
        $r = [];

        for ($i = 0; $i <= 6; $i += 2) {
            $r[] = $i;
        }

        // QUIZ
        $a = [0, 2, 4, 6];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_090(): void
    {
        $r = [];
        $i = 0;

        while ($i < 3) {
            $r[] = $i;
            $i++;
        }

        // QUIZ
        $a = [0, 1, 2];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_100(): void
    {
        $r = [];
        $i = 0;

        while ($i < 6) {
            $r[] = $i;
            $i += 2;
        }

        // QUIZ
        $a = [0, 2, 4];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_110(): void
    {
        $r = [];
        $i = 0;

        while ($i <= 6) {
            $r[] = $i;
            $i += 2;
        }

        // QUIZ
        $a = [0, 2, 4, 6];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_120(): void
    {
        $r = [];
        $i = 1;

        while ($i <= 10) {
            $r[] = $i;
            $i += $i;
        }

        // QUIZ
        $a = [1, 2, 4, 8];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_130(): void
    {
        $r = [];

        for ($i = 0; $i <= 5; $i++) {
            if ($i == 3) {
                continue;
            }
            $r[] = $i;
        }

        // QUIZ
        $a = [0, 1, 2, 4, 5];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_140(): void
    {
        $r = [];

        for ($i = 0; $i <= 5; $i++) {
            if ($i <  3) {
                continue;
            }
            $r[] = $i;
        }

        // QUIZ
        $a = [3, 4, 5];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_150(): void
    {
        $r = [];

        for ($i = 0; $i <= 5; $i++) {
            if ($i == 4) {
                break;
            }
            $r[] = $i;
        }

        // QUIZ
        $a = [0, 1, 2, 3];
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_180_160(): void
    {
        $r = [];

        for ($i = 0; $i <= 5; $i++) {
            if ($i > 3) {
                break;
            }
            $r[] = $i;
        }

        // QUIZ
        $a = [0, 1, 2, 3];
        // /QUIZ

        $this->assertSame($a, $r);
    }
}

