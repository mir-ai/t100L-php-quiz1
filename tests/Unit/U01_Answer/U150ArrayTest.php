<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

// 配列
// https://www.php.net/manual/ja/language.types.array.php
class U150ArrayTest extends TestCase
{
    public function test_150_010(): void
    {
        $actual = [];

        $this->assertSame([], $actual);
    }

    public function test_150_020(): void
    {
        $actual = [1, 2, 3];

        $this->assertSame([1, 2, 3], $actual);
    }

    public function test_150_030(): void
    {
        $actual = [1, 2];
        $r[] = 3;

        // QUIZ
        $expected = [1, 2, 3];
        // /QUIZ      

        $this->assertSame($expected, $actual);
    }

    public function test_150_040(): void
    {
        $actual = [];
        $r[] = 1;
        $r[] = 2;
        $r[] = 3;

        // QUIZ
        $expected = [1, 2, 3];
        // /QUIZ      

        $this->assertSame($expected, $actual);
    }

    public function test_150_050(): void
    {
        $actual = ['a', 'b', 'c'];

        $this->assertSame(['a', 'b', 'c'], $actual);
    }

    public function test_150_060(): void
    {
        $actual = ['a', 'b'];
        $r[] = 'c';

        // QUIZ
        $expected = ['a', 'b', 'c'];
        // /QUIZ      

        $this->assertSame($expected, $actual);
    }

    public function test_150_070(): void
    {
        $actual = [];
        $r[] = 'a';
        $r[] = 'b';
        $r[] = 'c';

        // QUIZ
        $expected = ['a', 'b', 'c'];
        // /QUIZ      

        $this->assertSame($expected, $actual);
    }
}

