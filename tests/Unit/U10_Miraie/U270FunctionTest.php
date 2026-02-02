<?php

namespace Tests\Unit\U10_Miraie;

use PHPUnit\Framework\TestCase;

class U270FunctionTest extends TestCase
{
    private static int $counter = 0;

    public function test_270_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    /**
     * 数値を渡すと、1 を加えて返す
     *
     * @param integer $n
     * @return integer
     */
    private function addOne(int $n): int
    {
        return $n + 1;
    }

    /**
     * 文字列を渡すと、末尾に ! をつけて返す
     *
     * @param string $s
     * @return string
     */
    private function addExclamation(string $s): string
    {
        return $s . '!';
    }

    // Static 関数を定義
    private static function counter(): int
    {
        return Self::$counter++;
    }

    public function test_270_020_func1(): void
    {
        $r = $this->addOne(1);

        // QUIZ
        $a = 2;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_270_030_func2(): void
    {
        $r = $this->addExclamation('Hi');

        // QUIZ
        $a = 'Hi!';
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_270_040_func3(): void
    {
        $r1 = $this->counter();
        $r2 = $this->counter();
        $r3 = $this->counter();

        $a1 = $a2 = $a3 = 0;

        // a1, a2, a3の値を入れる。
        // QUIZ
        $a1 = 0;
        $a2 = 1;
        $a3 = 2;
        // /QUIZ

        $this->assertSame($a1, $r1);
        $this->assertSame($a2, $r2);
        $this->assertSame($a3, $r3);
    }
}
