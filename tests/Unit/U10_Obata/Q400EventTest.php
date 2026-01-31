<?php

namespace Tests\Unit\U10_Obata;

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
		$a = null;
        // /QUIZ
        $a = $this->getOutput();

        $this->assertSame($a, $r);
    }

}
