<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class Q150ArrayTest extends TestCase
{
    public function test_150_010(): void
    {
        $r = [];

        $this->assertSame([], $r);
    }

    public function test_150_020(): void
    {
        $r = [1, 2, 3];

        $this->assertSame([1, 2, 3], $r);
    }

    public function test_150_030(): void
    {
        $r = [1, 2];
        $r[] = 3;

        // QUIZ
        $a = [1, 2, 3];
        // /QUIZ      

        $this->assertSame($a, $r);
    }

    public function test_150_040(): void
    {
        $r = [];
        $r[] = 1;
        $r[] = 2;
        $r[] = 3;

        // QUIZ
        $a = [1, 2, 3];
        // /QUIZ      

        $this->assertSame($a, $r);
    }

    public function test_150_050(): void
    {
        $r = ['a', 'b', 'c'];

        $this->assertSame(['a', 'b', 'c'], $r);
    }

    public function test_150_060(): void
    {
        $r = ['a', 'b'];
        $r[] = 'c';

        // QUIZ
        $a = ['a', 'b', 'c'];
        // /QUIZ      

        $this->assertSame($a, $r);
    }

    public function test_150_070(): void
    {
        $r = [];
        $r[] = 'a';
        $r[] = 'b';
        $r[] = 'c';

        // QUIZ
        $a = ['a', 'b', 'c'];
        // /QUIZ      

        $this->assertSame($a, $r);
    }
}

