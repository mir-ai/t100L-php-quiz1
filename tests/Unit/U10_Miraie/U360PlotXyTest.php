<?php

namespace Tests\Unit\U10_Miraie;

use PHPUnit\Framework\TestCase;

class U360PlotXyTest extends TestCase
{
    //
    public function test_360_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // 課題 : キャンバス上への座標によるプロット

    // クイズ： getInput() のテキストから、 getOutput() の配列を作成して下さい。
    // これが入力データの配列
    private function getInput(): array
    {
        return [
            #  y    x   char
            [  0 ,  2 , '@'],
            [  0 ,  3 , '@'],
            [  0 ,  4 , '@'],
            [  0 ,  5 , '@'],
            [  0 ,  6 , '@'],
            [  0 ,  7 , '@'],
            [  0 ,  8 , '@'],
            [  0 ,  9 , '@'],
            [  1 ,  1 , '@'],
            [  1 , 10 , '@'],
            [  2 ,  0 , '@'],
            [  2 ,  3 , 'O'],
            [  2 ,  8 , 'O'],
            [  2 , 11 , '@'],
            [  3 ,  0 , '@'],
            [  3 , 11 , '@'],
            [  4 ,  0 , '@'],
            [  4 ,  2 , ' '],
            [  4 ,  3 , '\\'],
            [  4 ,  4 , '_'],
            [  4 ,  5 , '_'],
            [  4 ,  6 , '_'],
            [  4 ,  7 , '_'],
            [  4 ,  8 , '/'],
            [  4 , 11 , '@'],
            [  5 ,  0 , '@'],
            [  5 , 11 , '@'],
            [  6 ,  1 , '@'],
            [  6 , 10 , '@'],
            [  7 ,  2 , '@'],
            [  7 ,  3 , '@'],
            [  7 ,  4 , '@'],
            [  7 ,  5 , '@'],
            [  7 ,  6 , '@'],
            [  7 ,  7 , '@'],
            [  7 ,  8 , '@'],
            [  7 ,  9 , '@'],
        ];
    }

    // これを作りたい
    private function getOutput(): array
    {
        return [
            #000000000011
            #0123456789AB
            '  @@@@@@@@  ', #0
            ' @        @ ', #1
            '@  O    O  @', #2
            '@          @', #3
            '@  \____/  @', #4
            '@          @', #5
            ' @        @ ', #6
            '  @@@@@@@@  ', #7
        ];
    }

    // ヒント 要素分解１
    // 縦横の最大サイズを作成する
    public function test_360_020_find_max_x_y() : void
    {
        $inputs = $this->getInput();

        // 要素分解1. 縦横の最大サイズを作成する
        [$max_x, $max_y] = [0, 0];

        foreach ($inputs as $input) {
            [$y, $x, $char] = $input;
            $max_x = max($x, $max_x);
            $max_y = max($y, $max_y);
        }

        $this->assertSame(11, $max_x);
        $this->assertSame(7, $max_y);
    }

    // ヒント 要素分解２
    // 空白のみのキャンバスを作成する
    public function test_350_030_flip_2d_array() : void
    {
        $max_x = 3;
        $max_y = 2;

        $canvas = [];
        for ($y = 0; $y <= $max_y; $y++) {
            $canvas[] = array_fill(0, $max_x + 1, ' ');
        }

        $expected = [
            [' ', ' ', ' ', ' '],
            [' ', ' ', ' ', ' '],
            [' ', ' ', ' ', ' '],
        ];

        $this->assertSame($expected, $canvas);
    }

    // ヒント 要素分解3
    // 座標データに従って、キャンバス（配列）に文字を描く
    public function test_350_040_2d_array_to_texts(): void
    {
        $actual = [
            [' ', ' ', ' ', ' '],
            [' ', ' ', ' ', ' '],
            [' ', ' ', ' ', ' '],
        ];

        $plots = [
            [0, 0, 'A'],
            [0, 1, 'B'],
            [0, 2, 'C'],
            [1, 2, 'D'],
            [2, 2, 'E'],
        ];

        foreach ($plots as $plot) {
            [$y, $x, $char] = $plot;
            $actual[$y][$x] = $char;
        }

        $expected = [
            ['A', 'B', 'C', ' '],
            [' ', ' ', 'D', ' '],
            [' ', ' ', 'E', ' '],
        ];

        $this->assertSame($expected, $actual);
    }

    // ヒント 要素分解4
    // 座標データに従って、キャンバス（配列）に文字を描く
    public function test_350_040_draw_2d_array(): void
    {
        $v = [
            ['A', 'B', 'C', ' '],
            [' ', ' ', 'D', ' '],
            [' ', ' ', 'E', ' '],
        ];

        $actual = [];
        foreach ($v as $line) {
            $actual[] = implode('', $line);
            echo implode('', $line) . "\n";
        }

        $expected = [
            'ABC ',
            '  D ',
            '  E ',
        ];

        $this->assertSame($expected, $actual);
    }

    // やってみよう
    // getInputの値を読んで、getOutputを作って下さい。
    public function test_350_draw(): void
    {
        // 入力を取得する
        $inputs = $this->getInput();

        // QUIZ
		$expected = null;
        // /QUIZ
        $expected = $this->getOutput();

        $this->assertSame($expected, $actual);
    }

}
