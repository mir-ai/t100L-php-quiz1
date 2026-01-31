<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class Q350FlipArrayTest extends TestCase
{
    //
    public function test_350_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // クイズ： getXmlString() のテキストから、 getReportTable() の配列を作成して下さい。
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

    // 要素分解１
    // 文字列の配列を、２次元配列に変換する
    public function test_350_020_lines_to_2d_array() : void
    {
        $lines = [
            'abc',
            '123',
        ];

        $r = [];
        foreach ($lines as $line) {
            $chars = str_split($line);
            $r[] = $chars;
        }

        $a = [
            ['a', 'b', 'c'],
            ['1', '2', '3'],
        ];

        $this->assertSame($a, $r);
    }

    // 要素分解２
    // ２次元配列の、縦と横を入れ替えたものを作成する
    public function test_350_030_flip_2d_array() : void
    {
        $v = [
            ['a', 'b', 'c'],
            ['1', '2', '3'],
        ];

        $r = [];
        foreach ($v as $y => $items) {
            foreach ($items as $x => $val) {
                $r[$x][$y] = $val;
            }
        }

        $a = [
            ['a', '1'],
            ['b', '2'],
            ['c', '3'],
        ];

        $this->assertSame($a, $r);
    }

    // 要素分解3
    // ２次元配列を、文字列に直す
    public function test_350_040_2d_array_to_texts(): void
    {
        $v = [
            ['a', '1'],
            ['b', '2'],
            ['c', '3'],
        ];

        $r = [];
        foreach ($v as $y => $items) {
            $r[] = implode('', $items);
        }

        $a = [
            'a1',
            'b2',
            'c3',
        ];

        $this->assertSame($a, $r);
    }

    // じぶんでやってみよう
    // getInputの値を読んで、getOutputを作って下さい。
    public function test_350_050_flip(): void
    {
        // 入力を取得する
        $inputs = $this->getInput();
        $outputs = [];

        // QUIZ

        // 文字列の配列を、２次元配列に変換する
        $original_items = [];
        foreach ($inputs as $input) {
            $chars = str_split($input);
            $original_items[] = $chars;
        }

        // ２次元配列の、縦と横を入れ替えたものを作成する
        $transposed = [];
        foreach ($original_items as $y => $items) {
            foreach ($items as $x => $val) {
                $transposed[$x][$y] = $val;
            }
        }

        // ２次元配列を、文字列に直す
        foreach ($transposed as $y => $items) {
            $outputs[] = implode('', $items);
        }

        // /QUIZ

        $r = $outputs;
        $a = $this->getOutput();

        $this->assertSame($a, $r);
    }

}        
