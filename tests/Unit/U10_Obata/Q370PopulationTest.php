<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;

class Q370PopulationTest extends TestCase
{
    //
    public function test_370_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // 浜松市で一番高齢化(65歳以上の人口の占める割合)の高い町名
    //
    private function getOutput(): array
    {
        return [
            '浜松市天竜区春野地区春野町大時',
            '浜松市天竜区佐久間地区佐久間町戸口',
            '浜松市天竜区春野地区春野町花島',
        ];
    }

    // 要素分解1 ファイルから各項目を読んで取得する
    public function test_370_read_csv(): void
    {
        $filename = 'tests/Unit/data/town_age_population_small.csv';
        $contents = file_get_contents($filename);
        if (! $contents) {
            echo "{$filename} を読み込めません。";
        }

        // 要素分解 ファイルから各項目を読んで取得する
        $lines = explode("\n", $contents);
        $col_names = [];
        $r = []; // 2次元配列。
        foreach ($lines as $no => $line) {
            if (! $line) {
                continue;
            }
            $line = trim($line);
            $cols = explode(',', $line);

            if ($no == 0) {
                $col_names = $cols;
                continue;
            }

            $item = [];
            foreach ($col_names as $x => $col_name) {
                $item[$col_name] = $cols[$x] ?? '';
            }
            $r[] = $item;
        }

        $a = [
            [
                "NO" => "53446",
                "都道府県コード又は市区町村コード" => "221309",
                "都道府県" => "静岡県",
                "市区町村名" => "浜松市",
                "対象年月" => "202409",
                "区CD" => "22140",
                "区" => "天竜区",
                "地区" => "春野地区",
                "大字CD" => "9006",
                "大字" => "春野町大時",
                "年齢" => "0",
                "合計" => "0",
                "男性" => "0",
                "女性" => "0",
                "備考" => "",
            ],
            [
                "NO" => "53511",
                "都道府県コード又は市区町村コード" => "221309",
                "都道府県" => "静岡県",
                "市区町村名" => "浜松市",
                "対象年月" => "202409",
                "区CD" => "22140",
                "区" => "天竜区",
                "地区" => "春野地区",
                "大字CD" => "9006",
                "大字" => "春野町大時",
                "年齢" => "65",
                "合計" => "100",
                "男性" => "1",
                "女性" => "0",
                "備考" => "",
            ],
            [
                "NO" => "55861",
                "都道府県コード又は市区町村コード" => "221309",
                "都道府県" => "静岡県",
                "市区町村名" => "浜松市",
                "対象年月" => "202409",
                "区CD" => "22140",
                "区" => "天竜区",
                "地区" => "佐久間地区",
                "大字CD" => "10008",
                "大字" => "佐久間町戸口",
                "年齢" => "0",
                "合計" => "10",
                "男性" => "0",
                "女性" => "0",
                "備考" => "",
            ],
            [
                "NO" => "55926",
                "都道府県コード又は市区町村コード" => "221309",
                "都道府県" => "静岡県",
                "市区町村名" => "浜松市",
                "対象年月" => "202409",
                "区CD" => "22140",
                "区" => "天竜区",
                "地区" => "佐久間地区",
                "大字CD" => "10008",
                "大字" => "佐久間町戸口",
                "年齢" => "65",
                "合計" => "100",
                "男性" => "1",
                "女性" => "0",
                "備考" => "",
            ],
            [
                "NO" => "54391",
                "都道府県コード又は市区町村コード" => "221309",
                "都道府県" => "静岡県",
                "市区町村名" => "浜松市",
                "対象年月" => "202409",
                "区CD" => "22140",
                "区" => "天竜区",
                "地区" => "春野地区",
                "大字CD" => "9015",
                "大字" => "春野町花島",
                "年齢" => "0",
                "合計" => "20",
                "男性" => "0",
                "女性" => "0",
                "備考" => "",
            ],
            [
                "NO" => "54456",
                "都道府県コード又は市区町村コード" => "221309",
                "都道府県" => "静岡県",
                "市区町村名" => "浜松市",
                "対象年月" => "202409",
                "区CD" => "22140",
                "区" => "天竜区",
                "地区" => "春野地区",
                "大字CD" => "9015",
                "大字" => "春野町花島",
                "年齢" => "65",
                "合計" => "100",
                "男性" => "0",
                "女性" => "0",
                "備考" => "",
            ]
        ];

        $this->assertSame($a, $r);
    }

    // 要素分解2
    // データを中間配列1に入れる
    // $data['市区町村名'] = [
    //   'total_count' => 100,
    //   'elder_count' => 60,
    // ]
    public function test_360_030_make_array_1(): void
    {
        $v = [
            [
                "NO" => "53446",
                "都道府県コード又は市区町村コード" => "221309",
                "都道府県" => "静岡県",
                "市区町村名" => "浜松市",
                "対象年月" => "202409",
                "区CD" => "22140",
                "区" => "天竜区",
                "地区" => "春野地区",
                "大字CD" => "9006",
                "大字" => "春野町大時",
                "年齢" => "0",
                "合計" => "30",
                "男性" => "30",
                "女性" => "0",
                "備考" => "",
            ],
            [
                "NO" => "53511",
                "都道府県コード又は市区町村コード" => "221309",
                "都道府県" => "静岡県",
                "市区町村名" => "浜松市",
                "対象年月" => "202409",
                "区CD" => "22140",
                "区" => "天竜区",
                "地区" => "春野地区",
                "大字CD" => "9006",
                "大字" => "春野町大時",
                "年齢" => "65",
                "合計" => "70",
                "男性" => "70",
                "女性" => "0",
                "備考" => "",
            ],
        ];

        $r = [];
        foreach ($v as $item) {
            $town_name = "{$item['市区町村名']}{$item['区']}{$item['地区']}{$item['大字']}";

            $total_count = $r[$town_name]['total_count'] ?? 0;
            $r[$town_name]['total_count'] = $total_count + intval($item['合計']);

            if ($item['年齢'] >= 65) {
                $elder_count = $r[$town_name]['elder_count'] ?? 0;
                $r[$town_name]['elder_count'] = $elder_count + intval($item['合計']);
            }
        }

        $a = [
            "浜松市天竜区春野地区春野町大時" => [
                "total_count" => 100,
                "elder_count" => 70
            ]
        ];

        $this->assertSame($a, $r);
    }

    // 要素分解3 中間配列１から各町の人数と高齢者数を読んで、高齢者率を計算する
    public function test_360_040_test(): void
    {
        $v = [
            "浜松市天竜区春野地区春野町大時" => [
                "total_count" => 100,
                "elder_count" => 70
            ]
        ];

        $r = [];
        foreach ($v as $city_name => $count_item) {
            $total_count = $count_item['total_count'];
            $elder_count = $count_item['elder_count'];
            if ($total_count) {
                $elder_rate = ($elder_count / $total_count);
            }

            $r[$city_name] = $elder_rate;
        }

        $a = [
            '浜松市天竜区春野地区春野町大時' => 0.7
        ];

        $this->assertSame($a, $r);
    }

    // 要素分解4 高齢化率の多い順に並べ替える
    // 要素分解5 上位3件を取得
    public function test_360_050_orders()
    {
        $v = [
            'みらい市' => 60.0,
            'こだい市'  => 80.0,
            'かこ市'  => 70.0,
        ];

        // 高齢化率の多い順に並べ替える
        arsort($v);

        // 上位2件を取得
        $r = array_slice($v, 0, 2);

        $a = [
            'こだい市'  => 80.0,
            'かこ市'  => 70.0,
        ];

        $this->assertSame($a, $r);
    }

    // じぶんでやってみよう
    // ファイルを読んで
    public function test_360_highest_elder_town(): void
    {
        // 元データを読み込む
        //$filename = 'tests/Unit/data/town_age_population.csv';
        $filename = 'tests/Unit/data/town_age_population_small.csv';
        $contents = file_get_contents($filename);
        if (! $contents) {
            echo "{$filename} を読み込めません。";
        }

        $r = [];

        // QUIZ
		$a = null;
        // /QUIZ
        $a = $this->getOutput();

        $this->assertSame($a, $r);
    }

}
