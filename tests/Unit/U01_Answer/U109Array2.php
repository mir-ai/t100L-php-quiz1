<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U109Array2 extends TestCase
{
    public function test_u100184(): void
    {
        $r = [1, 2, 3];

        $this->assertSame([1, 2, 3], $r);
    }

    public function test_u100185(): void
    {
        $r = [
            1, 
            2, 
            3
        ];

        $this->assertSame([1, 2, 3], $r);
    }

    public function test_u100186(): void
    {
        $r = [
            [10, 11, 12], 
            [20, 21, 22], 
            [30, 31, 32], 
        ];

        $this->assertSame([
            [10, 11, 12], 
            [20, 21, 22], 
            [30, 31, 32], 
        ], $r);
    }

    public function test_u100187(): void
    {
        $r = [
            ['a', 'b', 'c'], 
            ['d', 'e', 'f'], 
            ['g', 'h', 'i'], 
        ];

        $this->assertSame([
            ['a', 'b', 'c'], 
            ['d', 'e', 'f'], 
            ['g', 'h', 'i'], 
        ], $r);
    }
    
    public function test_u100188(): void
    {
        $r = [
            1,
            2,
            3
        ];

        $this->assertSame([1, 2, 3], $r);
    }

    public function test_u100189(): void
    {
        $r = [
            0 => 1,
            1 => 2,
            2 => 3,
        ];

        $this->assertSame([1, 2, 3], $r);
    }

    public function test_u100190(): void
    {
        $r = [
            'a', 
            'b', 
            'c', 
        ];

        $this->assertSame(['a', 'b', 'c'], $r);
    }

    public function test_u100191(): void
    {
        $r = [
            0 => 'a', 
            1 => 'b', 
            2 => 'c', 
        ];

        $this->assertSame(['a', 'b', 'c'], $r);
    }

    public function test_u100192(): void
    {
        $r = [
            0  => 'a', 
            10 => 'b', 
            20 => 'c', 
        ];

        $this->assertSame([0 => 'a', 10 => 'b', 20 => 'c'], $r);
    }

    public function test_u100193(): void
    {
        $r = [
            0   => 'a', 
            100 => 'b', 
            200 => 'c', 
        ];

        $this->assertSame([0 => 'a', 100 => 'b', 200 => 'c'], $r);
    }

    public function test_u100194(): void
    {
        $r = [
            'first'  => 'a', 
            'second' => 'b', 
            'third'  => 'c', 
        ];

        $this->assertSame(['first' => 'a', 'second' => 'b', 'third' => 'c'], $r);
    }

    public function test_u100195(): void
    {
        $population_kvs = [
            'Tokyo'  => 14047594, 
            'Osaka' =>  8837685, 
            'Aichi'  => 7542415,
        ];

        $this->assertSame(['Tokyo' => 14047594, 'Osaka' => 8837685, 'Aichi' => 7542415], $population_kvs);
    }
    
    public function test_u100196(): void
    {
        $population_kvs = [
            '東京都'  => 14047594, 
            '大阪府' =>  8837685, 
            '愛知県'  => 7542415,
        ];

        $this->assertSame(['東京都' => 14047594, '大阪府' => 8837685, '愛知県' => 7542415], $population_kvs);
    }
    
    public function test_u100197(): void
    {
        $population_kvs = [
            '東京都'  => [13159388, 13515271, 14047594], 
            '大阪府' =>  [8865245, 8839469, 8837685], 
            '愛知県'  => [7410719, 7483128, 7542415],
        ];

        $this->assertSame(
            [
                '東京都'  => [13159388, 13515271, 14047594], 
                '大阪府' =>  [8865245, 8839469, 8837685], 
                '愛知県'  => [7410719, 7483128, 7542415],
            ],
            $population_kvs
        );
    }
    
    public function test_u100198(): void
    {
        $years = ['2010', '2015', '2020'];
        $population_kvs = [
            '東京都'  => [13159388, 13515271, 14047594], 
            '大阪府' =>  [8865245, 8839469, 8837685], 
            '愛知県'  => [7410719, 7483128, 7542415],
        ];

        $this->assertSame(['2010', '2015', '2020'], $years);
        $this->assertSame(
            [
                '東京都'  => [13159388, 13515271, 14047594], 
                '大阪府' =>  [8865245, 8839469, 8837685], 
                '愛知県'  => [7410719, 7483128, 7542415],
            ],
            $population_kvs
        );
    }
    
    public function test_u100199(): void
    {
        $population_kvs = [
            '東京都'  => [
                '2010' => 13159388, 
                '2015' => 13515271, 
                '2020' => 14047594
            ], 
            '大阪府' =>  [
                '2010' => 8865245,
                '2015' => 8839469,
                '2020' => 8837685
            ], 
            '愛知県'  => [
                '2010' => 7410719,
                '2015' => 7483128,
                '2020' => 7542415
            ],
        ];

        $this->assertSame(
            [
                '東京都'  => [
                    '2010' => 13159388, 
                    '2015' => 13515271, 
                    '2020' => 14047594
                ], 
                '大阪府' =>  [
                    '2010' => 8865245,
                    '2015' => 8839469,
                    '2020' => 8837685
                ], 
                '愛知県'  => [
                    '2010' => 7410719,
                    '2015' => 7483128,
                    '2020' => 7542415
                ],
            ],
            $population_kvs
        );
    }

    public function test_u100200(): void
    {
        $prefectures = ['Tokyo', 'Oosaka', 'Aichi'];
        $r = [];

        foreach ($prefectures as $prefecture) {
            $r[] = $prefecture . ' Love';
        }

        $this->assertSame(['Tokyo Love', 'Oosaka Love', 'Aichi Love'], $r);
    }

    public function test_u100201(): void
    {
        $prefectures = ['東京都', '大阪府', '愛知県'];
        $r = [];

        foreach ($prefectures as $prefecture) {
            $r[] = "{$prefecture}ラブ";
        }

        $this->assertSame(['東京都ラブ', '大阪府ラブ', '愛知県ラブ'], $r);
    }

    public function test_u100202(): void
    {
        $population_kvs = [
            '東京都'  => 14047594, 
            '大阪府' =>  8837685, 
            '愛知県'  => 7542415,
        ];

        $r = [];

        foreach ($population_kvs as $name => $population) {
            $r[] = "{$name}の人口は{$population}人です。";
        }

        $this->assertSame([
            '東京都の人口は14047594人です。',
            '大阪府の人口は8837685人です。',
            '愛知県の人口は7542415人です。'
        ], $r);
    }

    public function test_u100203(): void
    {
        $translation_kvs = [
            '犬'  => 'dog',
            '猫' =>  'cat',
            'ネズミ'  => 'rat',
        ];

        $r = [];

        foreach ($translation_kvs as $japanese => $english) {
            $r[] = "{$japanese}の英語訳は{$english}です。";
        }

        $this->assertSame([
            '犬の英語訳はdogです。',
            '猫の英語訳はcatです。',
            'ネズミの英語訳はratです。',
        ], $r);
    }

    public function test_u100204(): void
    {
        $company_url_kvs = [
            'Yahoo'  => 'https://www.yahoo.co.jp/',
            'Amazon' =>  'https://www.amazon.co.jp/',
            'MIRAiE'  => 'https://www.mir-ai.co.jp/',
        ];

        $r = [];

        foreach ($company_url_kvs as $company => $url) {
            $r[] = "{$company}のホームページアドレスは {$url} です。";
        }

        $this->assertSame([
            'Yahooのホームページアドレスは https://www.yahoo.co.jp/ です。',
            'Amazonのホームページアドレスは https://www.amazon.co.jp/ です。',
            'MIRAiEのホームページアドレスは https://www.mir-ai.co.jp/ です。',
        ], $r);
    }
    
    public function test_u100205(): void
    {
        $population_kvs = [
            '東京都'  => [13159388, 13515271, 14047594], 
            '大阪府' =>  [8865245, 8839469, 8837685], 
            '愛知県'  => [7410719, 7483128, 7542415],
        ];

        $r = [];

        foreach ($population_kvs as $prefecture => $populations) {
            $r[] = "{$prefecture}の人口推移";
            foreach ($populations as $population) {
                $r[] = $population;
            }
        }

        $this->assertSame([
            '東京都の人口推移',
            13159388,
            13515271,
            14047594,
            '大阪府の人口推移',
            8865245,
            8839469,
            8837685,
            '愛知県の人口推移',
            7410719,
            7483128,
            7542415,
        ], $r);
    }    
    
    public function test_u100206(): void
    {
        $population_kvs = [
            '東京都'  => [
                '2010' => 13159388, 
                '2015' => 13515271, 
                '2020' => 14047594
            ], 
            '大阪府' =>  [
                '2010' => 8865245,
                '2015' => 8839469,
                '2020' => 8837685
            ], 
            '愛知県'  => [
                '2010' => 7410719,
                '2015' => 7483128,
                '2020' => 7542415
            ],
        ];

        $r = [];

        foreach ($population_kvs as $prefecture => $population_kvs) {
            foreach ($population_kvs as $year => $population) {
                $r[] = "{$prefecture}の{$year}年の人口は{$population}です。";
            }
        }

        $this->assertSame([
            '東京都の2010年の人口は13159388です。',
            '東京都の2015年の人口は13515271です。',
            '東京都の2020年の人口は14047594です。',
            '大阪府の2010年の人口は8865245です。',
            '大阪府の2015年の人口は8839469です。',
            '大阪府の2020年の人口は8837685です。',
            '愛知県の2010年の人口は7410719です。',
            '愛知県の2015年の人口は7483128です。',
            '愛知県の2020年の人口は7542415です。',
        ], $r);
    }    

    public function test_u100207(): void
    {
        $animal_translation_kvs = [
            '犬'  => [
                '英語' => 'dog', 
                '中国語' => '狗', 
                '韓国語' => '개',
            ], 
            '猫' =>  [
                '英語' => 'cat', 
                '中国語' => '猫', 
                '韓国語' => '고양이',
            ], 
            'ネズミ'  => [
                '英語' => 'rat', 
                '中国語' => '鼠', 
                '韓国語' => '쥐',
            ],
        ];

        $r = [];

        foreach ($animal_translation_kvs as $animal => $translation_kvs) {
            foreach ($translation_kvs as $language => $word) {
                $r[] = "{$animal}は{$language}で{$word}です。";
            }
        }

        $this->assertSame([
            '犬は英語でdogです。',
            '犬は中国語で狗です。',
            '犬は韓国語で개です。',
            '猫は英語でcatです。',
            '猫は中国語で猫です。',
            '猫は韓国語で고양이です。',
            'ネズミは英語でratです。',
            'ネズミは中国語で鼠です。',
            'ネズミは韓国語で쥐です。',
        ], $r);
    }    
    
    public function test_u100208(): void
    {
        $kvs = [];
        $kvs['東京都'] = 14047594;
        $kvs['大阪府'] = 8837685;
        $kvs['愛知県'] = 7542415;

        $r = [];
        $r[] = $kvs['東京都'];
        $r[] = $kvs['大阪府'];
        $r[] = $kvs['愛知県'];

        $this->assertSame([
            14047594,
            8837685,
            7542415,
        ], $r);
    }


    /**
     * 
     *  assertNull($var)	$varがNULLである
     *  assertEquals($val1, $val2)	$val1が$val2と等しい
     *  assertSame($val1, $val2)	$val1と$val2が型も含めて等しい
     *  assertInternalType($type, $val)	$valの型名が$typeである
     *      
     *  assertGreaterThan($expect, $var)	$expect < $var が成立する
     *  assertGreaterThanOrEqual($expect, $var)	$expect <= $var が成立する
     *  assertLessThan($expect, $var)	$expect > $var が成立する
     *  assertLessThanOrEqual($expect, $var)	$expect >= $var が成立する
     *      
     *  assertJsonStringEqualsJsonString($str1, $str2)	$str1と$str2がjsonとして等しい
     *  assertRegExp($ptn, $str)	$strが正規表現$ptnにマッチする
     *      
     *  assertTrue($var)	$varがTRUEである
     *  assertFalse($var)	$varがFALSEである
     *      
     *  assertArrayHasKey($key, $array)	配列$arrayにキー$keyが存在する
     *  assertContains($val, $array)	配列$arrayに値$valが存在する
     *  assertContainsOnly($type, $array)	配列$arrayの値の型がすべて$typeである
     *  assertCount($count, $array)	配列$arrayの値の数が$countである
     *  assertEmpty($array)	配列$arrayが空である
     *      
     *  assertObjectHasAttribute($attr, $object)	オブジェクト$objectにプロパティ変数$attrが存在する
     *  assertClassHasAttribute($attr, $class)	クラス名$classにプロパティ変数$attrが存在する
     *  assertClassHasStaticAttribute($attr, $class)	クラス名$classに静的プロパティ変数$attrが存在する
     *  assertInstanceOf($class, $instance)	$instanceがクラス名$classのインスタンスである
     *      
     *  assertFileExists($file)	$fileが存在する
     *  assertFileEquals($file1, $file2)	$file1と$file2の内容が等しい
     *  assertJsonFileEqualsJsonFile($file1, $file2)	$file1と$file2の内容がjsonとして等しい
     *  assertJsonStringEqualsJsonFile($file1, $json)	$file1の内容と$jsonがjsonとして等しい
     */
}

