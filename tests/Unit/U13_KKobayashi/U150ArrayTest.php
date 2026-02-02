<?php

namespace Tests\Unit\U13_KKobayashi;

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
        $actual[] = 3;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_150_040(): void
    {
        $actual = [];
        $actual[] = 1;
        $actual[] = 2;
        $actual[] = 3;

        // QUIZ
		$expected = null;
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
        $actual[] = 'c';

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_150_070(): void
    {
        $actual = [];
        $actual[] = 'a';
        $actual[] = 'b';
        $actual[] = 'c';

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }
}

