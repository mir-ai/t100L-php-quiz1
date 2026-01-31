<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;

class Q240Operators2Test extends TestCase
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
        $r = ($v == 1) ? 'one' : 'not one';

        $this->assertSame('one', $r);
    }

    public function test_240_030_ternary_operator2(): void
    {
        $v = 2;
        $r = ($v == 1) ? 'one' : 'not one';

        $this->assertSame('not one', $r);
    }

    // 三項演算子 Ternary Operator (真ん中を省略)
    public function test_240_040_ternary_operator3(): void
    {
        $v = 1;
        $r = $v ?: 'not true';

        $this->assertSame(1, $r);
    }

    public function test_240_050_ternary_operator4(): void
    {
        $v = 0;
        $r = $v ?: 'not true';

        $this->assertSame('not true', $r);
    }

    // Null 合体演算子 Null Coalescing Operator
    // https://www.php.net/manual/ja/language.operators.comparison.php#language.operators.comparison.ternary
    public function test_240_060_null_coalescing_operator1(): void
    {
        $v = 1;
        $r = $v ?? 9;

        $this->assertSame(1, $r);
    }

    public function test_240_070_null_coalescing_operator2(): void
    {
        $v = null;
        $r = $v ?? 9;

        $this->assertSame(9, $r);
    }

    public function test_240_080_null_coalescing_operator3(): void
    {
        $v['one'] = 1;
        $r = $v['one'] ?? 9;

        $this->assertSame(1, $r);
    }

    public function test_240_090_null_coalescing_operator4(): void
    {
        $v['one'] = 1;
        $r = $v['nine'] ?? 9; // nineは連想配列に定義されてない

        $this->assertSame(9, $r);
    }

    public function test_240_100_null_coalescing_operator5(): void
    {
        $r = $v ?? 9; // $v が未定義

        $this->assertSame(9, $r);
    }

}

