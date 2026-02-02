<?php

namespace Tests\Unit\U13_KKobayashi;

use PHPUnit\Framework\TestCase;

// 変数操作関数
// https://www.php.net/manual/ja/book.var.php
class U230VariableFunctionsTest extends TestCase
{
    //
    public function test_230_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // empty 742
    public function test_230_020_empty1(): void
    {
        $is_empty1 = empty(0);
        $is_empty2 = empty('');
        $is_empty3 = empty([]);
        $is_empty4 = empty(null);
        $is_empty5 = empty($undefined_variable);

        $v = ['x' => 1];
        $is_empty6 = empty($v['y']);

        $this->assertTrue($is_empty1);
        $this->assertTrue($is_empty2);
        $this->assertTrue($is_empty3);
        $this->assertTrue($is_empty4);
        $this->assertTrue($is_empty5);
        $this->assertTrue($is_empty6);
    }

    // isset 124
    public function test_230_030_isset1(): void
    {
        $v = ['x' => 1];
        $this->assertTrue(isset($v['x']));
        $this->assertFalse(isset($v['y']));
    }

    // unset 28
    public function test_230_040_unset1(): void
    {
        $v = ['x' => 1, 'y' => 2];
        $this->assertTrue(isset($v['y']));

        unset($v['y']);
        $this->assertFalse(isset($v['y']));
    }

    // intval  202
    public function test_230_050_intval(): void
    {
        $this->assertSame(0, intval(null));
        $this->assertSame(0, intval(''));
        $this->assertSame(0, intval(0));
        $this->assertSame(123, intval('123'));
    }

    // strval  25
    public function test_230_060_strval(): void
    {
        $this->assertSame('', strval(null));
        $this->assertSame('', strval(''));
        $this->assertSame('0', strval(0));
        $this->assertSame('123', strval(123));
    }

    // floatval  17
    public function test_230_070_floatval(): void
    {
        $this->assertSame(0.0, floatval(null));
        $this->assertSame(0.0, floatval(''));
        $this->assertSame(0.0, floatval(0));
        $this->assertSame(123.0, floatval('123'));
    }

    // boolval 2
    public function test_230_080_boolval(): void
    {
        $this->assertFalse(boolval(false));
        $this->assertFalse(boolval(null));
        $this->assertFalse(boolval(''));
        $this->assertFalse(boolval(0));

        $this->assertTrue(boolval(true));
        $this->assertTrue(boolval('1'));
        $this->assertTrue(boolval('A'));
    }

    // is_null 5
    public function test_230_090_is_null(): void
    {
        $this->assertTrue(is_null(null));
        $this->assertFalse(is_null(0));
        $this->assertFalse(is_null(''));
        $this->assertFalse(is_null(1));
    }

    // is_numeric  15
    public function test_230_100_is_numeric(): void
    {
        $this->assertTrue(is_numeric(0));
        $this->assertTrue(is_numeric(123));
        $this->assertTrue(is_numeric(123.45));

        $this->assertTrue(is_numeric('0'));
        $this->assertTrue(is_numeric('123'));
        $this->assertTrue(is_numeric('123.45'));

        $this->assertFalse(is_numeric('A'));
        $this->assertFalse(is_numeric('ABC'));
        $this->assertFalse(is_numeric('ABCDE'));

        $this->assertFalse(is_numeric('１２３'));
        $this->assertFalse(is_numeric('百二十三'));
    }

    // is_int  9
    public function test_230_110_is_int(): void
    {
        $this->assertTrue(is_int(0));
        $this->assertTrue(is_int(1));
        $this->assertFalse(is_int(1.2));

        $this->assertFalse(is_int('0'));
        $this->assertFalse(is_int('十'));
        $this->assertFalse(is_int('A'));
    }

    // is_string 2
    public function test_230_120_is_string(): void
    {
        $this->assertFalse(is_string(0));
        $this->assertFalse(is_string(123));
        $this->assertFalse(is_string(123.45));

        $this->assertTrue(is_string('0'));
        $this->assertTrue(is_string('123'));
        $this->assertTrue(is_string('123.45'));

        $this->assertTrue(is_string('A'));
        $this->assertTrue(is_string('ABC'));
        $this->assertTrue(is_string('ABCDE'));

        $this->assertTrue(is_string('１２３'));
        $this->assertTrue(is_string('百二十三'));
    }

    // is_array  9
    public function test_230_130_is_array(): void
    {
        $this->assertTrue(is_array([]));
        $this->assertTrue(is_array([0]));
        $this->assertTrue(is_array(['a' => 1]));

        $this->assertFalse(is_array(0));
        $this->assertFalse(is_array('0'));
        $this->assertFalse(is_array('A'));
    }

    public function test_230_140_to_string(): void
    {
        $v = 123;

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertTrue(is_string($expected));
        $this->assertSame('123', $expected);
    }

    public function test_230_150_to_int(): void
    {
        $v = "123";

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertTrue(is_numeric($expected));
        $this->assertSame(123, $expected);
    }

}

