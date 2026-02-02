<?php

namespace Tests\Unit\U10_Miraie;

use PHPUnit\Framework\TestCase;

class U240Operators2Test extends TestCase
{
    //
    public function test_240_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // 三項演算子 Ternary Operator
    // https://www.php.net/manual/ja/language.operators.comparison.php#language.operators.comparison.ternary
    public function test_240_020_ternary_operator1(): void
    {
        $v = 1;
        $actual = ($v == 1) ? 'one' : 'not one';

        $this->assertSame('one', $actual);
    }

    public function test_240_030_ternary_operator2(): void
    {
        $v = 2;
        $actual = ($v == 1) ? 'one' : 'not one';

        $this->assertSame('not one', $actual);
    }

    // 三項演算子 Ternary Operator (真ん中を省略)
    public function test_240_040_ternary_operator3(): void
    {
        $v = 1;
        $actual = $v ?: 'not true';

        $this->assertSame(1, $actual);
    }

    public function test_240_050_ternary_operator4(): void
    {
        $v = 0;
        $actual = $v ?: 'not true';

        $this->assertSame('not true', $actual);
    }

    // Null 合体演算子 Null Coalescing Operator
    // https://www.php.net/manual/ja/language.operators.comparison.php#language.operators.comparison.ternary
    public function test_240_060_null_coalescing_operator1(): void
    {
        $v = 1;
        $actual = $v ?? 9;

        $this->assertSame(1, $actual);
    }

    public function test_240_070_null_coalescing_operator2(): void
    {
        $v = null;
        $actual = $v ?? 9;

        $this->assertSame(9, $actual);
    }

    public function test_240_080_null_coalescing_operator3(): void
    {
        $v['one'] = 1;
        $actual = $v['one'] ?? 9;

        $this->assertSame(1, $actual);
    }

    public function test_240_090_null_coalescing_operator4(): void
    {
        $v['one'] = 1;
        $actual = $v['nine'] ?? 9; // nineは連想配列に定義されてない

        $this->assertSame(9, $actual);
    }

    public function test_240_100_null_coalescing_operator5(): void
    {
        $actual = $v ?? 9; // $v が未定義

        $this->assertSame(9, $actual);
    }

}

