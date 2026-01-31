<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class Q400EventTest extends TestCase
{
    //
    public function test_400_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // 浜松市で一番イベントが開催されている場所を抽出する
    private function getOutput(): array
    {
        return [
            "浜松こども館",
            "浜松市男女共同参画・文化芸術活動推進センター（あいホール）",
            "クリエート浜松",
        ];
    }

    // じぶんでやってみよう
    // tests/Unit/data/event.tsv (または tests/Unit/data/event_small.tsv)
    // を読み込んで、一番イベントが開催されている場所名称を上位３件を取得します。
    public function test_400_popular_places(): void
    {
        // 元データを読み込む
        $filename = 'tests/Unit/data/221309_hamamatsu_event_utf8.csv';
        // $filename = 'tests/Unit/data/221309_hamamatsu_event_utf8_small.csv';
        $is_first = true;
        $col_names = [];
        $all_items = [];
        $r = null;

        // QUIZ

        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($cols = fgetcsv($handle)) !== false) {
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
        $r = array_slice($count_by_place_names, 0, 3);

        // キー（施設名称）のみにする
        $r = array_keys($r);

        // /QUIZ
        $a = $this->getOutput();

        $this->assertSame($a, $r);
    }

}        
