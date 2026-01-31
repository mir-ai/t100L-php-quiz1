<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

// 文字列型
// https://www.php.net/manual/ja/language.types.string.php
class Q140StringTest extends TestCase
{
    public function test_140_010(): void
    {
        $r = 'abc';

        // QUIZ
        $a = 'abc';
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_140_020(): void
    {
        $r = "abc";

        // QUIZ
        $a = 'abc';
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_140_030(): void
    {
        $n = 1;
        $r = 'abc{$n}';

        // QUIZ
        $a = 'abc{$n}';
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_140_040(): void
    {
        $n = 1;
        $r = "abc{$n}";

        // QUIZ
        $a = 'abc1';
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_140_050(): void
    {
        $s = 'def';
        $r = "abc{$s}";

        // QUIZ
        $a = 'abcdef';
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_140_060(): void
    {
        $r = 'a' . 'b' . 'c';

        // QUIZ
        $a = 'abc';
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_140_070(): void
    {
        $r = 'a' . 'b' . 'c' . 1 . 2 . 3;

        // QUIZ
        $a = 'abc123';
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_140_071(): void
    {
        $r = '';
        $r .= '1';

        // QUIZ
        $r .= '2';
        // /QUIZ

        $a = '12';

        $this->assertSame($a, $r);
    }

    public function test_140_080(): void
    {
        $r = '\n';

        // QUIZ
        $a = '\n';
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_140_090(): void
    {
        $r = ("\n" == '\n');

        // QUIZ
        $a = false;
        // /QUIZ
        
        $this->assertSame($a, $r);
    }

    // シングルクォートでむと、\t は \t という文字になります。
    public function test_140_091(): void
    {
        $r = '\t';

        // QUIZ
        $a = '\t';
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // ダブルクォートで囲むと、\t はタブになります。
    public function test_140_092(): void
    {
        $r = ("\t" == '\t');

        // QUIZ
        $a = false;
        // /QUIZ
        
        $this->assertSame($a, $r);
    }

    public function test_140_100(): void
    {
        $r = ('"' == "\"");

        // QUIZ
        $a = true;
        // /QUIZ

        $this->assertSame($a, $r); // "
    }

    public function test_140_110(): void
    {
        $r = ("'" == '\'');

        // QUIZ
        $a = true;
        // /QUIZ

        $this->assertSame($a, $r); // '
    }

    public function test_140_120(): void
    {
        $r = ("\\" == '\\');

        // QUIZ
        $a = true;
        // /QUIZ

        $this->assertSame($a, $r); # \
    }

    public function test_140_130(): void
    {
        $r = <<<END
    *
   * *
  *   *
 *     *
*********
END;

        // QUIZ
        $a = "    *
   * *
  *   *
 *     *
*********";
        // /QUIZ

        $this->assertSame($a, $r);
    }

    

}

