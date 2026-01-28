<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U111ArrayFunctions extends TestCase
{
    // 
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // array_merge 681
    public function test_array_merge1(): void
    {
        $r = array_merge([1, 2, 3], [4, 5, 6]);
        $this->assertSame([1, 2, 3, 4, 5, 6], $r);
    }

    // array_merge 681
    public function test_array_merge2(): void
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

        $this->assertSame([
                'a' => 1,
                'b' => 2,
                'c' => 3,
                'd' => 4,
                'e' => 5,
                'f' => 6
        ], $r);
    }

    // list  364
    public function test_list(): void
    {
        list($a, $b) = [1, 2];
        $this->assertSame(1, $a);
        $this->assertSame(2, $b);

        [$a, $b] = [1, 2];
        $this->assertSame(1, $a);
        $this->assertSame(2, $b);
    }

    // implode 307
    public function test_implode(): void
    {
        $r = implode(', ', ['a', 'b', 'c']);
        $this->assertSame('a, b, c', $r);
    }

    // explode 283
    public function test_explode(): void
    {
        $r = explode(', ', 'a, b, c');
        $this->assertSame(['a', 'b', 'c'], $r);
    }

    // in_array  116
    public function test_in_array1(): void
    {
        $r = in_array('a', ['a', 'b', 'c']);

        $this->assertTrue($r);
    }

    public function test_in_array2(): void
    {
        $r = in_array('d', ['a', 'b', 'c']);

        $this->assertFalse($r);
    }

    public function test_in_array3(): void
    {
        $r = in_array('d', ['a', 'b', 'c']);

        $this->assertFalse($r);
    }

    public function test_in_array4(): void
    {
        $r = in_array(1, [1, 2, 3]);

        $this->assertTrue($r);
    }

    public function test_in_array5(): void
    {
        $r = in_array("1", [1, 2, 3]);

        $this->assertTrue($r);
    }

    public function test_in_array6(): void
    {
        $r = in_array("1", [1, 2, 3], true); // 第三引数にtrueを指定して型を厳密に比較することもできる

        $this->assertFalse($r);
    }

    // array_keys  98
    public function test_array_keys(): void
    {
        $population_kvs = [
            '東京都'  => 14047594, 
            '大阪府' =>  8837685, 
            '愛知県'  => 7542415,
        ];

        $r = array_keys($population_kvs);

        $this->assertSame(['東京都', '大阪府', '愛知県'], $r);
    }

    // array_values  45
    public function test_array_values(): void
    {
        $population_kvs = [
            '東京都'  => 14047594, 
            '大阪府' =>  8837685, 
            '愛知県'  => 7542415,
        ];

        $r = array_values($population_kvs);

        $this->assertSame([14047594, 8837685, 7542415], $r);
    }

    // array_unique  28
    public function test_array_unique(): void
    {
        $r = array_unique([1, 2, 3, 4, 3, 2, 1]);

        $this->assertSame([1, 2, 3, 4], $r);
    }

    // array_filter  25
    public function test_array_filter(): void
    {
        $r = array_filter([1, 2, 3, 0, '', [], null, 4, 5, 6]);
        $r = array_values($r); // 構造が変わってしまうので、array_valuesで整理

        $this->assertSame([1, 2, 3, 4, 5, 6], $r);
    }

    // array_chunk 18
    public function test_array_chunk(): void
    {
        $r = array_chunk([1, 2, 3, 4, 5, 6, 7], 3);

        $this->assertSame([[1, 2, 3], [4, 5, 6], [7]], $r);
    }

    // array_slice 12
    public function test_array_slice1(): void
    {
        $r = array_slice([1, 2, 3, 4, 5], 2, 2);

        $this->assertSame([3, 4], $r);
    }

    public function test_array_slice2(): void
    {
        $r = array_slice([1, 2, 3, 4, 5], -2, 2);

        $this->assertSame([4, 5], $r);
    }

    // array_reverse 9
    public function test_array_reverse(): void
    {
        $r = array_reverse([1, 2, 3]);
        $this->assertSame([3, 2, 1], $r);
    }

    // array_intersect 6
    public function test_array_intersect(): void
    {
        $r = array_intersect([1, 2, 3], [2, 3, 4, 5]);
        $r = array_values($r);
        $this->assertSame([2, 3], $r);
    }

    // array_diff  5
    public function test_array_diff(): void
    {
        $r = array_diff([1, 2, 3, 4], [3, 4, 5]);
        $this->assertSame([1, 2], $r);

        $r = array_diff([1, 2, 3, 4], [3], [4, 5]);
        $this->assertSame([1, 2], $r);
    }

    // array_count_values  2
    public function test_array_count_values(): void
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

    // array_flip  2
    public function test_array_flip(): void
    {
        $population_kvs = [
            '東京都'  => 14047594, 
            '大阪府' =>  8837685, 
            '愛知県'  => 7542415,
        ];
        
        $r = array_flip($population_kvs);

        $this->assertSame([
            14047594 => '東京都',
            8837685 => '大阪府',
            7542415 => '愛知県',
        ], $r);
    }

    // array_pop 2
    public function test_array_pop(): void
    {
        $v = [1, 2, 3];
        $r = array_pop($v);
        $this->assertSame(3, $r);
        $this->assertSame([1, 2], $v);
    }
    
    // array_unshift 2
    public function test_array_unshift(): void
    {
        $v = [1, 2, 3];
        array_unshift($v, -1, 0);
        $this->assertSame([-1, 0, 1, 2, 3], $v);
    }

    // array_shift 1
    public function test_array_shift(): void
    {
        $v = [1, 2, 3];
        array_unshift($v, -1, 0);
        $this->assertSame([-1, 0, 1, 2, 3], $v);
    }

    // array_key_exists  1
    public function test_array_key_exists(): void
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
    public function test_array_sum(): void
    {
        $r = array_sum([1, 2, 3, 4, 5]);
        $this->assertSame(15, $r);
    }

    // asort 3
    public function test_asort(): void
    {
        $r = [
            '千葉県' => 6284480,
            '埼玉県' => 7344765,
            '東京都' => 14047594,
            '神奈川県' => 9237337,
        ];

        asort($r);

        $this->assertSame([
            '千葉県' => 6284480,
            '埼玉県' => 7344765,
            '神奈川県' => 9237337,
            '東京都' => 14047594,
        ], $r);

    }

    // arsort 3
    public function test_arsort(): void
    {
        $r = [
            '千葉県' => 6284480,
            '埼玉県' => 7344765,
            '東京都' => 14047594,
            '神奈川県' => 9237337,
        ];

        arsort($r);

        $this->assertSame([
            '東京都' => 14047594,
            '神奈川県' => 9237337,
            '埼玉県' => 7344765,
            '千葉県' => 6284480,
        ], $r);
    }

    // ksort 6
    public function test_ksort(): void
    {
        $r = [
            'Chiba' => 6284480,
            'Saitama' => 7344765,
            'Tokyo' => 14047594,
            'Kanagawa' => 9237337,
        ];

        ksort($r);

        $this->assertSame([
            'Chiba' => 6284480,
            'Kanagawa' => 9237337,
            'Saitama' => 7344765,
            'Tokyo' => 14047594,
        ], $r);
    }    

    // krsort  1
    public function test_krsort(): void
    {
        $r = [
            'Chiba' => 6284480,
            'Saitama' => 7344765,
            'Tokyo' => 14047594,
            'Kanagawa' => 9237337,
        ];

        krsort($r);

        $this->assertSame([
            'Tokyo' => 14047594,
            'Saitama' => 7344765,
            'Kanagawa' => 9237337,
            'Chiba' => 6284480,
        ], $r);
    }    

    // array_column  7
    public function test_array_column(): void
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

        $this->assertSame([
            6284480,
            7344765,
            14047594,
            9237337,
        ], $r);
    }

    // array_multisort 7
    public function test_array_multisort(): void
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

        $r = array_multisort($populations, $prefectures);

        $this->assertSame([
            [
                'name' => '千葉県',
                'population' => 6284480
            ],
            [
                'name' => '埼玉県',
                'population' => 7344765	
            ],
            [
                'name' => '神奈川県',
                'population' => 9237337	
            ], 
            [
                'name' => '東京都',
                'population' => 14047594
            ], 
        ], $prefectures);
    }

}

