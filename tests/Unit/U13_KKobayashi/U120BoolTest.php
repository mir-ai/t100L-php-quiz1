<?php

namespace Tests\Unit\U13_KKobayashi;

use PHPUnit\Framework\TestCase;

class U120BoolTest extends TestCase
{
    // 論理型 (boolean)
    // https://www.php.net/manual/ja/language.types.boolean.php#language.types.boolean

    // 論理演算子
    // https://www.php.net/manual/ja/language.operators.logical.php

    public function test_120_010(): void
    {
        $v = true;
        $actual = ! $v;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_120_020(): void
    {
        $v = false;
        $actual = ! $v;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_120_030(): void
    {
        $actual = true && true;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_120_040(): void
    {
        $actual = true && false;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_120_050(): void
    {
        $actual = true || true;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_120_060(): void
    {
        $actual = true || false;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_120_070(): void
    {
        $actual = false || true;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_120_080(): void
    {
        $actual = false || false;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }
}

