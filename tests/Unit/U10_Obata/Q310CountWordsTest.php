<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;

class Q310CountWordsTest extends TestCase
{
    //
    public function test_310_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // クイズ： この文章中で４回位上登場する単語をアルファベット順に１次元配列 $r に格納して下さい。
    private function getInput(): string
    {
        $text = <<<END
Tokyo at No. 2 spot in global city index
Tokyo reached second place in the Global Power City Index, surpassing New York, according to a report released on Dec. 17 by the Mori Memorial Foundation.

It was the first time Tokyo has climbed to second in the ranking of the world’s cities, while London maintained the top spot.

The index ranks 48 major cities worldwide in six categories: economy, research and development, livability, environment, cultural interaction and accessibility.

Tokyo improved significantly in livability and cultural interaction.
END;

        return $text;
    }

    // 要素分解１
    // テキストデータを行ごとに分割して配列に入れる
    public function test_310_010_count_words(): void
    {
        // テキストデータを取得します。
        $text = <<<END
This is a pen.
That is a apple.
There is a dog.
END;

        $lines = explode("\n", $text); // 改行コード "\n" で分割しよう
        $a = [
            "This is a pen.",
            "That is a apple.",
            "There is a dog.",
        ];

        $this->assertSame($a, $lines);
    }

    // 要素分解2
    // 行のデータを単語ごとに分割して、配列に分ける
    public function test_310_020_count_words(): void
    {
        $lines = "This is a pen.";
        $words = explode(" ", $lines); // 空白 " " で分割しよう

        $a = ['This', 'is', 'a', 'pen.'];
        $this->assertSame($a, $words);
    }

    // 要素分解3： 単語を抽出して一旦配列に入れる
    public function test_310_030_count_words(): void
    {
        $lines = [
            "This is a pen.",
            "That is a apple.",
            "There is a dog.",
        ];

        $words = [];
        foreach ($lines as $line) {
            $_words = explode(' ', $line);
            foreach ($_words as $word) {
                $words[] = $word;
            }
        }

        $a = [
            "This",
            "is",
            "a",
            "pen.",
            "That",
            "is",
            "a",
            "apple.",
            "There",
            "is",
             "a",
             "dog.",
        ];

        $this->assertSame($a, $words);
    }

    // 要素分解4
    // 単語から余計な文字(. , ')を除去する
    public function test_310_040_remove_extra_chars(): void
    {
        $v = "Abc's,.";

        $r = str_replace(['.', ',', "'"], '', $v); // . , ' を置き換え

        $a = 'Abcs';

        $this->assertSame($a, $r);
    }

    // 要素分解5： array_count_values で一旦カウントする
    public function test_310_050_count(): void
    {
        $words = [
            "This",
            "is",
            "a",
            "pen",
            "That",
            "is",
            "a",
            "apple",
            "There",
            "is",
            "a",
            "dog",
        ];

        $counts = array_count_values($words);

        $a = [
            "This" => 1,
            "is" => 3,
            "a" => 3,
            "pen" => 1,
            "That" => 1,
            "apple" => 1,
            "There" => 1,
            "dog" => 1,
        ];

        $this->assertSame($a, $counts);
    }

    // 要素分解6： 3回以上出現する単語を配列に入れる
    public function test_310_050_count_words(): void
    {
        $counts = [
            "This" => 1,
            "is" => 3,
            "a" => 3,
            "pen" => 1,
            "That" => 1,
            "apple" => 1,
            "There" => 1,
            "dog" => 1,
        ];

        $frequens_words = [];
        foreach ($counts as $word => $count) {
            if ($count >= 3) {
                $frequens_words[] = $word;
            }
        }

        $a = [
            "is",
            "a",
        ];

        $this->assertSame($a, $frequens_words);
    }

    // 要素分解7： アルファベット順にソートする
    public function test_310_060_sort(): void
    {
        $frequens_words = [
            "is",
            "a",
        ];

        sort($frequens_words);

        $a = [
            'a',
            'is',
        ];

        $this->assertSame($a, $frequens_words);
    }

    // じぶんでやってみよう： 文章中の単語の数を数え
    public function test_310_070_count_words(): void
    {
        $text = $this->getInput();

        // QUIZ
		$a = null;
        // /QUIZ

        $a = [
            "Tokyo",
            "in",
            "the",
        ];

        $this->assertSame($a, $r);
    }
}
