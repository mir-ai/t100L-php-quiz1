<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;

class Q390GomiListTest extends TestCase
{
    //
    public function test_390_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // 浜松市で処理手数料が1240円の品目を抽出する
    //
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
    // tests/Unit/data/bunbetukubunitiran.tsv (または tests/Unit/data/bunbetukubunitiran_small.tsv)
    // を読み込んで、処理手数料が1240円のごみの、「品目」と「詳細」と「大きさ・長さ」欄を結合して配列に出力します。

    public function test_390_expensive_gomi(): void
    {
        // 元データを読み込む
        // $filename = 'tests/Unit/data/bunbetukubunitiran_small.tsv';
        $filename = 'tests/Unit/data/bunbetukubunitiran.tsv';
        $contents = file_get_contents($filename);
        if (! $contents) {
            echo "{$filename} を読み込めません。";
        }

        // QUIZ
		$a = null;
        // /QUIZ
        $a = $this->getOutput();

        $this->assertSame($a, $r);
    }

}
