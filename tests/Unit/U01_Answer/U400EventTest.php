<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U400EventTest extends TestCase
{
    //
    public function test_400_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // 実務課題 : 浜松市のイベント情報の検索・抽出

    // 浜松市で一番イベントが開催されている場所を抽出する

    // tests/Unit/data/event.tsv (または tests/Unit/data/event_small.tsv)
    // を読み込んで、一番イベントが開催されている場所名称を上位３件を取得してみよう。

    // 結果はこれになります。
    private function getOutput(): array
    {
        return [
            "浜松こども館",
            "浜松市男女共同参画・文化芸術活動推進センター（あいホール）",
            "クリエート浜松",
        ];
    }

    // じぶんでやってみよう
    public function test_400_020_popular_places(): void
    {
        // 元データを読み込む
        $filename = 'tests/Unit/data/events_utf8.csv';
        // $filename = 'tests/Unit/data/events_utf8_small.csv';
        $is_first = true;
        $col_names = [];
        $all_items = [];
        $actual = null;

        // QUIZ

        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($cols = fgetcsv(stream: $handle, escape: ",")) !== false) {
                if ($is_first) {
                    $col_names = $cols;
                    $is_first = false;
                } else {
                    $item = [];
                    foreach ($col_names as $x => $col_name) {
                        $item[$col_name] = $cols[$x] ?? '';
                    }
                    $all_items[] = $item;
                }
                $is_first = false;
            }
            fclose($handle);
        } else {
            echo "{$filename}を読み込めませんでした。";
            
        }

        // 場所名称ごとに、開催回数をカウントする。
        $count_by_place_names = [];
        foreach ($all_items as $item) {
            $place = $item['場所名称'] ?? '';
            if (! $place) {
                continue;
            }

            $n = $count_by_place_names[$place] ?? 0;
            $count_by_place_names[$place] = $n + 1;
        }

        // 開催回数の降順でソートする。
        arsort($count_by_place_names);

        // 上位３件を取得
        $v = array_slice($count_by_place_names, 0, 3);

        // キー（施設名称）のみにする
        $actual = array_keys($v);

        // /QUIZ
        $expected = $this->getOutput();

        $this->assertSame($expected, $actual);
    }

    // 上級問題1
    // 区ごと(中央区,浜名区,天竜区)のイベントの開催件数を求める    
    public function test_400_030_event_count_by_wards()
    {
        // QUIZ
        // /QUIZ
        $this->assertTrue(true);
    }

    // 上級問題2
    // 日毎のイベントの開催件数を求める
    public function test_400_040_event_count_by_date()
    {
        // QUIZ
        // /QUIZ
        $this->assertTrue(true);
    }

    // 上級問題3
    // 日毎の区ごとのイベントの開催件数を求める
    public function test_400_050_event_count_by_date_and_ward()
    {
        // QUIZ
        // /QUIZ
        $this->assertTrue(true);
    }

    // 上級問題4
    // イベント名に浜松が含まれるイベント名をすべて抽出する（浜松、ハママツ、はままつ、HAMAMATSU,Hamamatsu,hamamatu）
    public function test_400_060_filter_hamamatsu_event_names()
    {
        // QUIZ
        // /QUIZ
        $this->assertTrue(true);
    }

    // 上級問題5
    // 開始時間を0時〜23時（1時間刻み）にした場合の件数を求める。
    public function test_400_070_event_count_by_start_hours()
    {
        // QUIZ
        // /QUIZ
        $this->assertTrue(true);
    }



    



    

}        
