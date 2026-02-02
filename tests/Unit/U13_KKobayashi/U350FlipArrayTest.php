<?php

namespace Tests\Unit\U13_KKobayashi;

use PHPUnit\Framework\TestCase;

class U350FlipArrayTest extends TestCase
{
    //
    public function test_350_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // 課題 : 配列の変換

    // クイズ： getXmlString() の配列を行列に倒して、getOutput() の配列を作成して下さい。
    // これが入力データの配列
    private function getInput(): array
    {
        return [
            '  *  ',
            ' *** ',
            '*****',
            '  *  ',
            '  *  ',
        ];
    }

    // これを作りたい
    private function getOutput(): array
    {
        return [
            '  *  ',
            ' **  ',
            '*****',
            ' **  ',
            '  *  ',
        ];
    }

    // ヒント: 要素分解１
    // 文字列の配列を、２次元配列に変換する
    public function test_350_020_lines_to_2d_array() : void
    {
        $lines = [
            'abc',
            '123',
        ];

        $actual = [];
        foreach ($lines as $line) {
            $chars = str_split($line);
            $actual[] = $chars;
        }

        $expected = [
            ['a', 'b', 'c'],
            ['1', '2', '3'],
        ];

        $this->assertSame($expected, $actual);
    }

    // ヒント: 要素分解２
    // ２次元配列の、縦と横を入れ替えたものを作成する
    public function test_350_030_flip_2d_array() : void
    {
        $v = [
            ['a', 'b', 'c'],
            ['1', '2', '3'],
        ];

        $actual = [];
        foreach ($v as $y => $items) {
            foreach ($items as $x => $val) {
                $actual[$x][$y] = $val;
            }
        }

        $expected = [
            ['a', '1'],
            ['b', '2'],
            ['c', '3'],
        ];

        $this->assertSame($expected, $actual);
    }

    // ヒント: 要素分解3
    // ２次元配列を、文字列に直す
    public function test_350_040_2d_array_to_texts(): void
    {
        $v = [
            ['a', '1'],
            ['b', '2'],
            ['c', '3'],
        ];

        $actual = [];
        foreach ($v as $y => $items) {
            $actual[] = implode('', $items);
        }

        $expected = [
            'a1',
            'b2',
            'c3',
        ];

        $this->assertSame($expected, $actual);
    }

    // やってみよう
    // getInputの値を読んで、getOutputを作って下さい。
    public function test_350_050_flip(): void
    {
        // 入力を取得する
        $inputs = $this->getInput();
        $outputs = [];

        // QUIZ
		$expected = null;
        // /QUIZ

        $actual = $outputs;
        $expected = $this->getOutput();

        $this->assertSame($expected, $actual);
    }

}
