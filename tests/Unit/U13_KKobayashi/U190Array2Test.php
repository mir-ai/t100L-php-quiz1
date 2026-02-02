<?php

namespace Tests\Unit\U13_KKobayashi;

use PHPUnit\Framework\TestCase;

// 配列について（２）連想配列編
// https://zenn.dev/phpbeginners/articles/b83c65267d03bd

// 配列について（３）二次元配列編
// https://zenn.dev/phpbeginners/articles/33e622b6f8192b
class U190Array2Test extends TestCase
{
    public function test_190_010(): void
    {
        $actual = [1, 2, 3];

        $this->assertSame([1, 2, 3], $actual);
    }

    public function test_190_020(): void
    {
        $actual = [
            1,
            2,
            3
        ];

        $this->assertSame([1, 2, 3], $actual);
    }

    public function test_190_030(): void
    {
        $actual = [
            [10, 11, 12],
            [20, 21, 22],
            [30, 31, 32],
        ];

        $this->assertSame([
            [10, 11, 12],
            [20, 21, 22],
            [30, 31, 32],
        ], $actual);
    }

    public function test_190_040(): void
    {
        $actual = [
            ['a', 'b', 'c'],
            ['d', 'e', 'f'],
            ['g', 'h', 'i'],
        ];

        $this->assertSame([
            ['a', 'b', 'c'],
            ['d', 'e', 'f'],
            ['g', 'h', 'i'],
        ], $actual);
    }

    public function test_190_050(): void
    {
        $actual = [
            1,
            2,
            3
        ];

        $this->assertSame([1, 2, 3], $actual);
    }

    public function test_190_060(): void
    {
        $actual = [
            0 => 1,
            1 => 2,
            2 => 3,
        ];

        $this->assertSame([1, 2, 3], $actual);
    }

    public function test_190_070(): void
    {
        $actual = [
            'a',
            'b',
            'c',
        ];

        $this->assertSame(['a', 'b', 'c'], $actual);
    }

    public function test_190_080(): void
    {
        $actual = [
            0 => 'a',
            1 => 'b',
            2 => 'c',
        ];

        $this->assertSame(['a', 'b', 'c'], $actual);
    }

    public function test_190_090(): void
    {
        $actual = [
            0  => 'a',
            10 => 'b',
            20 => 'c',
        ];

        $this->assertSame([0 => 'a', 10 => 'b', 20 => 'c'], $actual);
    }

    public function test_190_100(): void
    {
        $actual = [
            0   => 'a',
            100 => 'b',
            200 => 'c',
        ];

        $this->assertSame([0 => 'a', 100 => 'b', 200 => 'c'], $actual);
    }

    public function test_190_110(): void
    {
        $actual = [
            'first'  => 'a',
            'second' => 'b',
            'third'  => 'c',
        ];

        $this->assertSame(['first' => 'a', 'second' => 'b', 'third' => 'c'], $actual);
    }

    public function test_190_115(): void
    {
        $actual = [
            'first'  => 'a',
            'second' => 'b',
            'third'  => 'c',
        ];

        $this->assertSame('a', $actual['first']);
    }

    public function test_190_116(): void
    {
        $v = [
            'first'  => 'a',
            'second' => 'b',
            'third'  => 'c',
        ];

        $actual = $v['second'];

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_190_120(): void
    {
        $population_kvs = [
            'Tokyo'  => 14047594,
            'Osaka' =>  8837685,
            'Aichi'  => 7542415,
        ];

        $this->assertSame(['Tokyo' => 14047594, 'Osaka' => 8837685, 'Aichi' => 7542415], $population_kvs);
    }

    public function test_190_130(): void
    {
        $population_kvs = [
            '東京都'  => 14047594,
            '大阪府' =>  8837685,
            '愛知県'  => 7542415,
        ];

        $this->assertSame(['東京都' => 14047594, '大阪府' => 8837685, '愛知県' => 7542415], $population_kvs);
    }

    public function test_190_140(): void
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

    public function test_190_150(): void
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

    public function test_190_160(): void
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

    public function test_190_170(): void
    {
        $prefectures = ['Tokyo', 'Oosaka', 'Aichi'];
        $actual = [];

        foreach ($prefectures as $prefecture) {
            $actual[] = $prefecture . ' Love';
        }

        $this->assertSame(['Tokyo Love', 'Oosaka Love', 'Aichi Love'], $actual);
    }

    public function test_190_180(): void
    {
        $prefectures = ['東京都', '大阪府', '愛知県'];
        $actual = [];

        foreach ($prefectures as $prefecture) {
            $actual[] = "{$prefecture}ラブ";
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_190_190(): void
    {
        $population_kvs = [
            '東京都'  => 14047594,
            '大阪府' =>  8837685,
            '愛知県'  => 7542415,
        ];

        $actual = [];

        foreach ($population_kvs as $name => $population) {
            $actual[] = "{$name}の人口は{$population}人です。";
        }

        $this->assertSame([
            '東京都の人口は14047594人です。',
            '大阪府の人口は8837685人です。',
            '愛知県の人口は7542415人です。'
        ], $actual);
    }

    public function test_190_200(): void
    {
        $translation_kvs = [
            '犬'  => 'dog',
            '猫' =>  'cat',
            'ネズミ'  => 'rat',
        ];

        $actual = [];

        foreach ($translation_kvs as $japanese => $english) {
            $actual[] = "{$japanese}の英語訳は{$english}です。";
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_190_210(): void
    {
        $company_url_kvs = [
            'Yahoo'  => 'https://www.yahoo.co.jp/',
            'Amazon' =>  'https://www.amazon.co.jp/',
            'MIRAiE'  => 'https://www.mir-ai.co.jp/',
        ];

        $actual = [];

        foreach ($company_url_kvs as $company => $url) {
            $actual[] = "{$company}のホームページアドレスは{$url}です。";
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_190_220(): void
    {
        $population_kvs = [
            '東京都'  => [13159388, 13515271, 14047594],
            '大阪府' =>  [8865245, 8839469, 8837685],
            '愛知県'  => [7410719, 7483128, 7542415],
        ];

        $actual = [];

        foreach ($population_kvs as $prefecture => $populations) {
            $actual[] = "{$prefecture}の人口推移";
            foreach ($populations as $population) {
                $actual[] = $population;
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
        ], $actual);
    }

    public function test_190_230(): void
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

        $actual = [];

        foreach ($population_kvs as $prefecture => $population_kvs) {
            foreach ($population_kvs as $year => $population) {
                $actual[] = "{$prefecture}の{$year}年の人口は{$population}です。";
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
        ], $actual);
    }

    public function test_190_240(): void
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

        $actual = [];

        foreach ($animal_translation_kvs as $animal => $translation_kvs) {
            foreach ($translation_kvs as $language => $word) {
                $actual[] = "{$animal}は{$language}で{$word}です。";
            }
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_190_250(): void
    {
        $kvs = [];
        $kvs['東京都'] = 14047594;
        $kvs['大阪府'] = 8837685;
        $kvs['愛知県'] = 7542415;

        $actual = [];
        $actual[] = $kvs['東京都'];
        $actual[] = $kvs['大阪府'];
        $actual[] = $kvs['愛知県'];

        $this->assertSame([
            14047594,
            8837685,
            7542415,
        ], $actual);
    }

    public function test_190_260(): void
    {
        $kvs = [
            '東武鉄道' => 463.3,
            '小田急電鉄' => 120.5,
            '東京メトロ' => 195.1,
            '京成電鉄' => 178.8,
            '西武鉄道' => 176.6,
            '東急鉄道' => 110.7,
            '京浜急行' =>  87.1,
            '京王電鉄' =>  84.7,
        ];

        $actual = [];

        // 自分で foreach 文と回答をかいて下さい。

        // QUIZ
		$expected = null;
        // /QUIZ

        $expected = [
            '東武鉄道の路線総延長は 463.3 キロです。',
            '小田急電鉄の路線総延長は 120.5 キロです。',
            '東京メトロの路線総延長は 195.1 キロです。',
            '京成電鉄の路線総延長は 178.8 キロです。',
            '西武鉄道の路線総延長は 176.6 キロです。',
            '東急鉄道の路線総延長は 110.7 キロです。',
            '京浜急行の路線総延長は 87.1 キロです。',
            '京王電鉄の路線総延長は 84.7 キロです。',
        ];
        $this->assertSame($expected, $actual);
    }

    public function test_190_270(): void
    {
        $kvs = [
            '東武鉄道' => [
                'length' => 463.3,
                'passengers' => 4524834
            ],
            '小田急電鉄' => [
                'length' => 120.5,
                'passengers' => 3575025
            ],
            '東京メトロ' => [
                'length' => 195.1,
                'passengers' => 13673968
            ],
            '京成電鉄' => [
                'length' => 178.8,
                'passengers' => 1443638
            ],
            '西武鉄道' => [
                'length' => 176.6,
                'passengers' => 3114486
            ],
            '東急鉄道' => [
                'length' => 110.7,
                'passengers' => 5827594
            ],
            '京浜急行' => [
                'length' =>  87.1,
                'passengers' => 2161920
            ],
            '京王電鉄' => [
                'length' =>  84.7,
                'passengers' => 3250863
            ],
        ];

        $actual = [];

        // 自分で foreach 文と回答をかいて下さい。
        // QUIZ
		$expected = null;
        // /QUIZ

        $expected = [
            '東武鉄道の路線総延長は 463.3 キロ、１日の乗降客数は 4524834 人です。',
            '小田急電鉄の路線総延長は 120.5 キロ、１日の乗降客数は 3575025 人です。',
            '東京メトロの路線総延長は 195.1 キロ、１日の乗降客数は 13673968 人です。',
            '京成電鉄の路線総延長は 178.8 キロ、１日の乗降客数は 1443638 人です。',
            '西武鉄道の路線総延長は 176.6 キロ、１日の乗降客数は 3114486 人です。',
            '東急鉄道の路線総延長は 110.7 キロ、１日の乗降客数は 5827594 人です。',
            '京浜急行の路線総延長は 87.1 キロ、１日の乗降客数は 2161920 人です。',
            '京王電鉄の路線総延長は 84.7 キロ、１日の乗降客数は 3250863 人です。',
        ];

        $this->assertSame($expected, $actual);
    }
}

