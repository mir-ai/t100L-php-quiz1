<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;

class Q210ArrayFunctionsTest extends TestCase
{
    //
    public function test_210_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // array_merge 681
    public function test_210_020_array_merge1(): void
    {
        $r = array_merge([1, 2, 3], [4, 5, 6]);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // array_merge 681
    public function test_210_030_array_merge2(): void
    {
        $r = array_merge(
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
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
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
        $r = implode(', ', ['a', 'b', 'c']);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // explode 283
    public function test_210_060_explode(): void
    {
        $r = explode(', ', 'a, b, c');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // in_array  116
    public function test_210_070_in_array1(): void
    {
        $r = in_array('a', ['a', 'b', 'c']);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_210_080_in_array2(): void
    {
        $r = in_array('d', ['a', 'b', 'c']);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_210_090_in_array3(): void
    {
        $r = in_array('d', ['a', 'b', 'c']);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_210_100_in_array4(): void
    {
        $r = in_array(1, [1, 2, 3]);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_210_110_in_array5(): void
    {
        $r = in_array("1", [1, 2, 3]);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_210_120_in_array6(): void
    {
        $r = in_array("1", [1, 2, 3], true); // 第三引数にtrueを指定して型を厳密に比較することもできる

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // array_keys  98
    public function test_210_130_array_keys(): void
    {
        $population_kvs = [
            '東京都'  => 14047594,
            '大阪府' =>  8837685,
            '愛知県'  => 7542415,
        ];

        $r = array_keys($population_kvs);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // array_values  45
    public function test_210_140_array_values(): void
    {
        $population_kvs = [
            '東京都'  => 14047594,
            '大阪府' =>  8837685,
            '愛知県'  => 7542415,
        ];

        $r = array_values($population_kvs);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // array_unique  28
    public function test_210_150_array_unique(): void
    {
        $r = array_unique([1, 2, 3, 4, 3, 2, 1]);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // array_filter  25
    public function test_210_160_array_filter(): void
    {
        $r = array_filter([1, 2, 3, 0, '', [], null, 4, 5, 6]);
        $r = array_values($r); // 構造が変わってしまうので、array_valuesで整理

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // array_chunk 18
    public function test_210_170_array_chunk(): void
    {
        $r = array_chunk([1, 2, 3, 4, 5, 6, 7], 3);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);

    }

    // array_slice 12
    public function test_210_180_array_slice1(): void
    {
        $r = array_slice([1, 2, 3, 4, 5], 2, 2);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_210_190_array_slice2(): void
    {
        $r = array_slice([1, 2, 3, 4, 5], -2, 2);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // array_reverse 9
    public function test_210_200_array_reverse(): void
    {
        $r = array_reverse([1, 2, 3]);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // array_intersect 6
    public function test_210_210_array_intersect(): void
    {
        $r = array_intersect([1, 2, 3], [2, 3, 4, 5]);
        $r = array_values($r);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // array_diff  5
    public function test_210_220_array_diff1(): void
    {
        $r = array_diff([1, 2, 3, 4], [3, 4, 5]);
        $r = array_values($r);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_210_230_array_diff2(): void
    {
        $r = array_diff(['a', 'b', 'c', 'd'], ['b'], ['c']);
        $r = array_values($r);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // array_count_values  2
    public function test_210_240_array_count_values1(): void
    {
        $r = array_count_values([1, 2, 'a', 'b', 1, 2, 3, 'a', 'c']);
        $this->assertSame([
            1 => 2,
            2 => 2,
            'a' => 2,
            'b' => 1,
            3 => 1,
            'c' => 1,
        ], $r);
    }

    public function test_210_250_array_count_values2(): void
    {
        $r = array_count_values([1, 1, 1, 2, 2, 3]);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // array_flip  2
    public function test_210_260_array_flip(): void
    {
        $population_kvs = [
            '東京都'  => 14047594,
            '大阪府' =>  8837685,
            '愛知県'  => 7542415,
        ];

        $r = array_flip($population_kvs);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // array_pop 2
    public function test_210_270_array_pop(): void
    {
        $v = [1, 2, 3];
        $r = array_pop($v);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);

        $this->assertSame([1, 2], $v);
    }

    // array_unshift 2
    public function test_210_280_array_unshift(): void
    {
        $v = [1, 2, 3];
        array_unshift($v, -1, 0);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $v);
    }

    // array_shift 1
    public function test_210_290_array_shift(): void
    {
        $v = [1, 2, 3];
        $r = array_shift($v);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
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
        $r = array_sum([1, 2, 3, 4, 5]);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // asort 3
    public function test_210_320_asort(): void
    {
        $r = [
            '千葉県' => 6284480,
            '埼玉県' => 7344765,
            '東京都' => 14047594,
            '神奈川県' => 9237337,
        ];

        asort($r);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // arsort 3
    public function test_210_330_arsort(): void
    {
        $r = [
            '千葉県' => 6284480,
            '埼玉県' => 7344765,
            '東京都' => 14047594,
            '神奈川県' => 9237337,
        ];

        arsort($r);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // ksort 6
    public function test_210_340_ksort(): void
    {
        $r = [
            'Chiba' => 6284480,
            'Saitama' => 7344765,
            'Tokyo' => 14047594,
            'Kanagawa' => 9237337,
        ];

        ksort($r);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // krsort  1
    public function test_210_350_krsort(): void
    {
        $r = [
            'Chiba' => 6284480,
            'Saitama' => 7344765,
            'Tokyo' => 14047594,
            'Kanagawa' => 9237337,
        ];

        krsort($r);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
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

        $r = array_column($prefectures, 'population');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
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
		$a = null;
        // /QUIZ

        $this->assertSame($a, $prefectures);
    }

}

