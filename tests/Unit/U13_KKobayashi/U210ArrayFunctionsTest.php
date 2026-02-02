<?php

namespace Tests\Unit\U13_KKobayashi;

use PHPUnit\Framework\TestCase;

// 配列 関数
// https://www.php.net/manual/ja/ref.array.php
class U210ArrayFunctionsTest extends TestCase
{
    //
    public function test_210_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // array_merge 681
    public function test_210_020_array_merge1(): void
    {
        $actual = array_merge([1, 2, 3], [4, 5, 6]);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_merge 681
    public function test_210_030_array_merge2(): void
    {
        $actual = array_merge(
            [
                'a' => 1,
                'b' => 2,
                'c' => 3
            ],
            [
                'd' => 4,
                'e' => 5,
                'f' => 6
            ]
        );

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // list  364
    public function test_210_040_list(): void
    {
        list($a, $b) = [1, 2];
        $this->assertSame(1, $a);
        $this->assertSame(2, $b);

        [$a, $b] = [1, 2];
        $this->assertSame(1, $a);
        $this->assertSame(2, $b);
    }

    // implode 307
    public function test_210_050_implode(): void
    {
        $actual = implode(', ', ['a', 'b', 'c']);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // explode 283
    public function test_210_060_explode(): void
    {
        $actual = explode(', ', 'a, b, c');

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // in_array  116
    public function test_210_070_in_array1(): void
    {
        $actual = in_array('a', ['a', 'b', 'c']);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_210_080_in_array2(): void
    {
        $actual = in_array('d', ['a', 'b', 'c']);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_210_090_in_array3(): void
    {
        $actual = in_array('d', ['a', 'b', 'c']);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_210_100_in_array4(): void
    {
        $actual = in_array(1, [1, 2, 3]);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_210_110_in_array5(): void
    {
        $actual = in_array("1", [1, 2, 3]);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_210_120_in_array6(): void
    {
        $actual = in_array("1", [1, 2, 3], true); // 第三引数にtrueを指定して型を厳密に比較することもできる

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_keys  98
    public function test_210_130_array_keys(): void
    {
        $population_kvs = [
            '東京都'  => 14047594,
            '大阪府' =>  8837685,
            '愛知県'  => 7542415,
        ];

        $actual = array_keys($population_kvs);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_values  45
    public function test_210_140_array_values(): void
    {
        $population_kvs = [
            '東京都'  => 14047594,
            '大阪府' =>  8837685,
            '愛知県'  => 7542415,
        ];

        $actual = array_values($population_kvs);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_unique  28
    public function test_210_150_array_unique(): void
    {
        $actual = array_unique([1, 2, 3, 4, 3, 2, 1]);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_filter  25
    public function test_210_160_array_filter(): void
    {
        $v = array_filter([1, 2, 3, 0, '', [], null, 4, 5, 6]);
        $actual = array_values($v); // 構造が変わってしまうので、array_valuesで整理

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_chunk 18
    public function test_210_170_array_chunk(): void
    {
        $actual = array_chunk([1, 2, 3, 4, 5, 6, 7], 3);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);

    }

    // array_slice 12
    public function test_210_180_array_slice1(): void
    {
        $actual = array_slice([1, 2, 3, 4, 5], 2, 2);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_210_190_array_slice2(): void
    {
        $actual = array_slice([1, 2, 3, 4, 5], -2, 2);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_reverse 9
    public function test_210_200_array_reverse(): void
    {
        $actual = array_reverse([1, 2, 3]);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_intersect 6
    public function test_210_210_array_intersect(): void
    {
        $actual = array_intersect([1, 2, 3], [2, 3, 4, 5]);
        $actual = array_values($actual);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_diff  5
    public function test_210_220_array_diff1(): void
    {
        $actual = array_diff([1, 2, 3, 4], [3, 4, 5]);
        $actual = array_values($actual);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_210_230_array_diff2(): void
    {
        $actual = array_diff(['a', 'b', 'c', 'd'], ['b'], ['c']);
        $actual = array_values($actual);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_count_values  2
    public function test_210_240_array_count_values1(): void
    {
        $actual = array_count_values([1, 2, 'a', 'b', 1, 2, 3, 'a', 'c']);
        $this->assertSame([
            1 => 2,
            2 => 2,
            'a' => 2,
            'b' => 1,
            3 => 1,
            'c' => 1,
        ], $actual);
    }

    public function test_210_250_array_count_values2(): void
    {
        $actual = array_count_values([1, 1, 1, 2, 2, 3]);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_flip  2
    public function test_210_260_array_flip(): void
    {
        $population_kvs = [
            '東京都'  => 14047594,
            '大阪府' =>  8837685,
            '愛知県'  => 7542415,
        ];

        $actual = array_flip($population_kvs);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_pop 2
    public function test_210_270_array_pop(): void
    {
        $v = [1, 2, 3];
        $actual = array_pop($v);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);

        $this->assertSame([1, 2], $v);
    }

    // array_unshift 2
    public function test_210_280_array_unshift(): void
    {
        $v = [1, 2, 3];
        array_unshift($v, -1, 0);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $v);
    }

    // array_shift 1
    public function test_210_290_array_shift(): void
    {
        $v = [1, 2, 3];
        $actual = array_shift($v);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_key_exists  1
    public function test_210_300_array_key_exists(): void
    {
        $v = [
            '犬' => 1,
            '猫' => 2,
        ];
        $v['ネズミ'] = 3;

        $this->assertTrue(array_key_exists('犬', $v));
        $this->assertTrue(array_key_exists('猫', $v));
        $this->assertTrue(array_key_exists('ネズミ', $v));
        $this->assertFalse(array_key_exists('亀', $v));
    }

    // array_sum 1
    public function test_210_310_array_sum(): void
    {
        $actual = array_sum([1, 2, 3, 4, 5]);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // asort 3
    public function test_210_320_asort(): void
    {
        $actual = [
            '千葉県' => 6284480,
            '埼玉県' => 7344765,
            '東京都' => 14047594,
            '神奈川県' => 9237337,
        ];

        asort($actual);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // arsort 3
    public function test_210_330_arsort(): void
    {
        $actual = [
            '千葉県' => 6284480,
            '埼玉県' => 7344765,
            '東京都' => 14047594,
            '神奈川県' => 9237337,
        ];

        arsort($actual);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // ksort 6
    public function test_210_340_ksort(): void
    {
        $actual = [
            'Chiba' => 6284480,
            'Saitama' => 7344765,
            'Tokyo' => 14047594,
            'Kanagawa' => 9237337,
        ];

        ksort($actual);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // krsort  1
    public function test_210_350_krsort(): void
    {
        $actual = [
            'Chiba' => 6284480,
            'Saitama' => 7344765,
            'Tokyo' => 14047594,
            'Kanagawa' => 9237337,
        ];

        krsort($actual);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_column  7
    public function test_210_360_array_column(): void
    {
        $prefectures = [
            [
                'name' => '千葉県',
                'population' => 6284480
            ],
            [
                'name' => '埼玉県',
                'population' => 7344765
            ],
            [
                'name' => '東京都',
                'population' => 14047594
            ],
            [
                'name' => '神奈川県',
                'population' => 9237337
            ],
        ];

        $actual = array_column($prefectures, 'population');

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // array_multisort 7
    public function test_210_370_array_multisort(): void
    {
        $prefectures = [
            [
                'name' => '千葉県',
                'population' => 6284480
            ],
            [
                'name' => '埼玉県',
                'population' => 7344765
            ],
            [
                'name' => '東京都',
                'population' => 14047594
            ],
            [
                'name' => '神奈川県',
                'population' => 9237337
            ],
        ];

        $populations = array_column($prefectures, 'population');

        array_multisort($populations, $prefectures);

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $prefectures);
    }

}

