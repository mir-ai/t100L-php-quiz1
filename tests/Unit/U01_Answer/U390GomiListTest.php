<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U390GomiListTest extends TestCase
{
    //
    public function test_390_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // 実務課題 : 浜松市のごみ品目情報の検索・抽出

    // tests/Unit/data/gomi_items_utf8.tsv (または tests/Unit/data/gomi_items_small_utf8.tsv)
    // を読み込んで、処理手数料が1240円のごみの、「品目」と「詳細」と「大きさ・長さ」欄を結合して配列に出力してみよう。
    // 
 
    // 結果はこれになります。
    private function getOutput(): array
    {
        return [
            "ウォーターベッド60cm以上",
            "折りたたみベッド大小問わず",
            "オルガン",
            "収納庫金属製60cm以上",
            "収納庫プラスチック製60cm以上",
            "ソファー（2人がけ用以上）2人がけ用以上",
            "ソファーベット",
            "卓球台60cm以上",
            "たんす60cm以上",
            "電子オルガン脚付き",
            "電子ピアノ脚付き",
            "電動ソファー",
            "電動ベッド",
            "パイプベッド大小問わず",
            "風呂浴槽（据え置き型）大小問わず",
            "ベッドセットマット・ベッド枠のセット",
            "ベッドマット（スプリング有り）",
            "ベッド枠60cm以上",
            "マッサージ機椅子型大小問わず",
            "マットレス（スプリング有り）",
            "物置金属製60cm以上",
            "物置金属製以外60cm以上",
            "物干し台コンクリート製の土台大小問わず",
            "浴槽据え置き型大小問わず",
            "ロッカー60cm以上",
            "ロフトベッド大小問わず",
        ];
    }

    // じぶんでやってみよう
    public function test_390_020_expensive_gomi(): void
    {
        // 元データを読み込む
        // $filename = 'tests/Unit/data/gomi_items_small_utf8.tsv';
        $filename = 'tests/Unit/data/gomi_items_utf8.tsv';
        $contents = file_get_contents($filename);
        if (! $contents) {
            echo "{$filename} を読み込めません。";
        }

        // QUIZ

        // ファイルから各項目を読んで取得する
        $lines = explode("\n", $contents);
        $col_names = [];
        $all_items = []; // 2次元配列。
        foreach ($lines as $no => $line) {
            if (! $line) {
                continue;
            }
            $line = trim($line);
            $cols = explode("\t", $line);

            if ($no == 0) {
                $col_names = $cols;
                continue;
            }

            $item = [];
            foreach ($col_names as $x => $col_name) {
                $item[$col_name] = $cols[$x] ?? '';
            }
            $all_items[] = $item;
        }

        // 処理手数料が1240円のものを抽出する
        $expensives = [];
        foreach ($all_items as $item) {
            $fee = $item['処理手数料'] ?? '';
            if ($fee != '1240円') {
                continue;
            }

            $expensives[] = "{$item['品目']}{$item['詳細']}{$item['大きさ・長さ']}";
        }

        $actual = $expensives;

        // /QUIZ
        $expected = $this->getOutput();

        $this->assertSame($expected, $actual);
    }

    // 上級課題1
    // アイロンの連絡ごみの処理手数料を探す
    public function test_390_030_iron_price(): void
    {
        $this->assertTrue(true);
    }

    // 上級課題2
    // 電池を取り外して排出する必要のあるごみ名称を抽出する。
    // 「排出方法･備考」に「電池類は取り外」と書かれているもの
    public function test_390_040_without_battery(): void
    {
        $this->assertTrue(true);
    }

    // 上級課題3
    // 全部の品目を１点ずつ排出したら、総額いくらになるかを求める。
    public function test_390_050_total_prices(): void
    {
        $this->assertTrue(true);
    }

}        
