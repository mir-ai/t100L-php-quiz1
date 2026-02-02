<?php

namespace Tests\Unit\U10_Miraie;

use PHPUnit\Framework\TestCase;

// 文字列型
// https://www.php.net/manual/ja/language.types.string.php
class U140StringTest extends TestCase
{
    public function test_140_010(): void
    {
        $actual = 'abc';

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_140_020(): void
    {
        $actual = "abc";

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_140_030(): void
    {
        $n = 1;
        $actual = 'abc{$n}';

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_140_040(): void
    {
        $n = 1;
        $actual = "abc{$n}";

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_140_050(): void
    {
        $s = 'def';
        $actual = "abc{$s}";

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_140_060(): void
    {
        $actual = 'a' . 'b' . 'c';

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_140_070(): void
    {
        $actual = 'a' . 'b' . 'c' . 1 . 2 . 3;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_140_071(): void
    {
        $actual = '';
        $actual .= '1';

        // QUIZ
		$expected = null;
        // /QUIZ

        $expected = '12';

        $this->assertSame($expected, $actual);
    }

    public function test_140_080(): void
    {
        $actual = '\n';

        // QUIZ
		$expected = null;
        // /QUIZ

        echo (__FUNCTION__ . ": actual は '{$actual}' です。\n");

        $this->assertSame($expected, $actual);
    }

    public function test_140_090(): void
    {
        $actual = "\n";

        // QUIZ
		$expected = null;
        // /QUIZ

        echo (__FUNCTION__ . ": actual は '{$actual}' です。\n");

        $this->assertSame($expected, $actual);
    }

    // シングルクォートでむと、\t は \t という文字になります。
    public function test_140_091(): void
    {
        $actual = '\t';

        // QUIZ
		$expected = null;
        // /QUIZ

        echo (__FUNCTION__ . ": actual は '{$actual}' です。\n");

        $this->assertSame($expected, $actual);
    }

    // ダブルクォートで囲むと、\t はタブになります。
    public function test_140_092(): void
    {
        $actual = "\t";

        // QUIZ
		$expected = null;
        // /QUIZ

        echo (__FUNCTION__ . ": actual は '{$actual}' です。\n");

        $this->assertSame($expected, $actual);
    }

    public function test_140_100(): void
    {
        $actual = '"';

        // QUIZ
		$expected = null;
        // /QUIZ

        echo (__FUNCTION__ . ": actual は '{$actual}' です。\n");

        $this->assertSame($expected, $actual); // "
    }

    public function test_140_110(): void
    {
        $actual = "'";

        // QUIZ
		$expected = null;
        // /QUIZ

        echo (__FUNCTION__ . ": actual は '{$actual}' です。\n");

        $this->assertSame($expected, $actual); // '
    }

    public function test_140_120(): void
    {
        $actual = "\\";

        // QUIZ
		$expected = null;
        // /QUIZ

        echo (__FUNCTION__ . ": actual は '{$actual}' です。\n");

        $this->assertSame($expected, $actual); # \
    }

    public function test_140_130(): void
    {
        $actual = <<<END
    *
   * *
  *   *
 *     *
*********
END;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }
}

