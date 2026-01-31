<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;

class Q200StringFunctionsTest extends TestCase
{
    //
    public function test_200_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // trim  461
    public function test_200_020_trim1(): void
    {
        $r = trim(" This is trimmed text.  \n");

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // sprintf 89
    public function test_200_030_sprintf_pad_zero(): void
    {
        $r = sprintf("%04d", 1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_040_sprintf_zero_pad_str(): void
    {
        $r = sprintf("%04s",'A');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_050_sprintf_zero_pad_space(): void
    {
        $r = sprintf("%4s",'A');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // mb_convert_kana 75
    public function test_200_060_mb_convert_kana_r(): void
    {
        //r	「全角」英字を「半角」に変換します。
        $r = mb_convert_kana('ＡＢＣ', 'r');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_070_mb_convert_kana_R2(): void
    {
        //R	「半角」英字を「全角」に変換します。
        $r = mb_convert_kana('ABC', 'R');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_080_mb_convert_kana_n(): void
    {
        //n	「全角」数字を「半角」に変換します。
        $r = mb_convert_kana('１２３', 'n');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_090_mb_convert_kana_N2(): void
    {
        //N	「半角」数字を「全角」に変換します。
        $r = mb_convert_kana('123', 'N');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_100_mb_convert_kana_a(): void
    {
        //a	「全角」英数字を「半角」に変換します。
        $r = mb_convert_kana('１２３ａｂｃ', 'a');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_110_mb_convert_kana_A2(): void
    {
        //A	「半角」英数字を「全角」に変換します （"a", "A" オプションに含まれる文字は、U+0022, U+0027, U+005C, U+007Eを除く U+0021 - U+007E の範囲です）。
        $r = mb_convert_kana('123abc', 'A');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_120_mb_convert_kana_s(): void
    {
        //s	「全角」スペースを「半角」に変換します（U+3000 -> U+0020）。
        $r = mb_convert_kana('　', 's');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_130_mb_convert_kana_S2(): void
    {
        //S	「半角」スペースを「全角」に変換します（U+0020 -> U+3000）。
        $r = mb_convert_kana(' ', 'S');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_140_mb_convert_kana_k(): void
    {
        //k	「全角カタカナ」を「半角カタカナ」に変換します。
        $r = mb_convert_kana('アイウ', 'k');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_150_mb_convert_kana_K2(): void
    {
        //K	「半角カタカナ」を「全角カタカナ」に変換します。
        $r = mb_convert_kana('ｱｲｳ', 'K');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_160_mb_convert_kana_h(): void
    {
        //h	「全角ひらがな」を「半角カタカナ」に変換します。
        $r = mb_convert_kana('あいう', 'h');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_170_mb_convert_kana_H2(): void
    {
        //H	「半角カタカナ」を「全角ひらがな」に変換します。
        $r = mb_convert_kana('ｱｲｳ', 'H');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_180_mb_convert_kana_c(): void
    {
        //c	「全角カタカナ」を「全角ひらがな」に変換します。
        $r = mb_convert_kana('アイウ', 'c');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_190_mb_convert_kana_C2(): void
    {
        //C	「全角ひらがな」を「全角カタカナ」に変換します。
        $r = mb_convert_kana('あいう', 'C');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_200_mb_convert_kana_KV(): void
    {
        //V	濁点付きの文字を一文字に変換します。"K", "H" と共に使用します。
        $r = mb_convert_kana('ｶﾞｷﾞｸﾞｹﾞｺﾞ', 'KV');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // strlen  44
    public function test_200_210_strlen(): void
    {
        $r = strlen('abc');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_220_strlen_jp(): void
    {
        $r = strlen('あいう');

        $a = 3;

        $this->assertNotSame($a, $r); // strlenは日本語不可
    }

    // mb_strlen 22
    public function test_200_230_mb_strlen_jp(): void
    {
        $r = mb_strlen('あいう');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r); // mb_strlenは日本語OK
    }

    // mb_strwidth 2
    public function test_200_240_mb_strwidth(): void
    {
        $r = mb_strwidth('あいうえお');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r); // mb_strwidth 全角文字は2でカウント。
    }

    // strtolower  43
    public function test_200_250_strtolower(): void
    {
        $r = strtolower('Abc');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_260_strtolower_jp(): void
    {
        $r = strtolower('Ａｂｃ');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertNotSame($a, $r); // strtolower は日本語不可
    }

    // mb_strtolower 7
    public function test_200_270_mb_strtolower_jp(): void
    {
        $r = mb_strtolower('Ａｂｃ');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r); // mb_strtolower は日本語OK
    }

    // strtoupper  27
    public function test_200_280_strtoupper(): void
    {
        $r = strtoupper('Abc');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_290_strtoupper_jp(): void
    {
        $r = strtoupper('Ａｂｃ');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertNotSame($a, $r);
    }

    // mb_strtoupper 1
    public function test_200_300_mb_strtoupper_jp(): void
    {
        $r = mb_strtoupper('Ａｂｃ');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // str_starts_with 114
    public function test_200_310_str_starts_with(): void
    {
        $r = str_starts_with('This is a pen.', 'This is ');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_320_str_starts_with_jp(): void
    {
        $r = str_starts_with('これは、ペンです。', 'これは、');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // str_ends_with 3
    public function test_200_330_str_ends_with(): void
    {
        $r = str_ends_with('This is a pen.', ' pen.');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // str_contains  108
    public function test_200_340_str_contains(): void
    {
        $r = str_contains('This is a pen.', ' is a ');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_350_str_contains_jp(): void
    {
        $r = str_contains('これは、ペンです。', '、ペン');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // strpos  108
    public function test_200_360_strpos1(): void
    {
        $r = strpos('abcde', 'a');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_370_strpos2(): void
    {
        $r = strpos('abcde', 'bc');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_380_strpos3(): void
    {
        $r = strpos('abcde', 'de');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_390_strpos4_jp(): void
    {
        $r = strpos('あいう', 'いう');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertNotSame($a, $r); // 日本語には使えない
    }

    // mb_strpos 1
    public function test_200_400_mb_strpos1_jp(): void
    {
        $r = mb_strpos('あいう', 'いう');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r); // mb_strpos は日本語OK
    }

    // substr  106
    public function test_200_410_substr1(): void
    {
        $r = substr('abcde', 1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_420_substr2(): void
    {
        $r = substr('abcde', 1, 2);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_430_substr3(): void
    {
        $r = substr('abcde', -1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_440_substr4(): void
    {
        $r = substr('abcde', -2);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_450_substr5(): void
    {
        $r = substr('abcde', -2, 1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_460_substr6_jp(): void
    {
        $r = substr('あいうえお', 1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertNotSame($a, $r); // substr 日本語には利用不可
    }

    // mb_substr 30
    public function test_200_470_mb_substr1_jp(): void
    {
        $r = mb_substr('あいうえお', 1);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r); // mb_substr 日本語OK
    }

    public function test_200_480_mb_substr2_jp(): void
    {
        $r = mb_substr('あいうえお', 1, 2);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r); // mb_substr 日本語OK
    }

    // str_replace 381
    public function test_200_490_str_replace1(): void
    {
        $r = str_replace('cd', 'CD', 'abcdef');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_500_str_replace2(): void
    {
        $r = str_replace(['b', 'c'], ['B', 'C'], 'abcdef');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_510_str_replace3_jp(): void
    {
        $r = str_replace('い', 'イ', 'あいうえお');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r); // 日本語も利用可能
    }

    public function test_200_520_str_replace4_jp(): void
    {
        $r = str_replace(['う', 'え'], ['ウ', 'エ'], 'あいうえお');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_530_str_replace5_jp(): void
    {
        // 複数の文字列の変換を行った場合、変換結果に対して変換を重ねる。
        // 予期せぬ結果に注意。('1'=>'one', 'one'=>'two')
        $r = str_replace(['1', 'one'], ['one', 'two'], '1');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // preg_replace  56
    public function test_200_540_preg_replace1(): void
    {
        $r = preg_replace('/\s+/', '-', 'This is  a  pen.'); //連続する空白を - にする

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_550_preg_replace2(): void
    {
        $r = preg_replace('/[^0-9]/', '', '090-1234-5678'); //数字以外を削除

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // mb_ereg_replace 23
    public function test_200_560_mb_ereg_replace1(): void
    {
        // さまざまなハイフンらしきものを - に統一する
        $r = mb_ereg_replace("[‐‑–—―−ｰ]", "-", '‐‑–—―−ｰ');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_570_mb_ereg_replace2(): void
    {
        // さまざまなクオーティーションらしきものを - に統一する
        $r = mb_ereg_replace("[´’‘゜'“´”\"\❛]", "'", "´’‘゜'“´”\"❛");

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_580_mb_ereg_replace3(): void
    {
        // 全角カタカナのみを残したい
        $r = mb_ereg_replace("[^ァ-ヶ]", "", "アイウエオかきくけこＡＢＣabc");

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // preg_match  54
    public function test_200_590_preg_match1(): void
    {
        $pattern = '/Y(\d\d)_M(\d\d)_D(\d\d)/';
        $v = 'Y26_M02_D28';
        $n1 = $n2 = $n3 = $n4 = '';
        if (preg_match($pattern, $v, $matches) !== false) {
            $n1 = $matches[1] ?? '';
            $n2 = $matches[2] ?? '';
            $n3 = $matches[3] ?? '';
        };

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, [$n1, $n2, $n3]);
    }

    public function test_200_600_preg_match2(): void
    {
        // ひらがなを含む
        $has_hiragana = preg_match('/[ぁ-ん]/u', 'イチニチイチゼン一日一善', $match);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $has_hiragana);
    }

    // preg_match_all  2
    public function test_200_610_preg_match_all(): void
    {
        $r = preg_match_all('/v=(\d+)/', 'v=1, v=20, v=300', $matches);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $matches);
    }

    // mb_ereg 30
    public function test_200_620_mb_ereg(): void
    {
        $r = mb_ereg('ｖ=(\d+)', 'ｖ=1, ｖ=20, ｖ=300', $matches);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $matches);
    }

    // json_encode 48
    public function test_200_630_json_encode1(): void
    {
        $v = [1,2,3];
        $r = json_encode($v);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_640_json_encode2(): void
    {
        $v = ['a', 'b', 'c'];
        $r = json_encode($v);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_650_json_encode3(): void
    {
        $v = [
            'Tokyo'  => 14047594,
            'Osaka' =>  8837685,
            'Aichi'  => 7542415,
        ];
        $r = json_encode($v);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_660_json_encode4(): void
    {
        $v = [
            '東京都'  => 14047594,
            '大阪府' =>  8837685,
            '愛知県'  => 7542415,
        ];
        $r = json_encode($v); // 漢字はエスケープされてしまう

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_670_json_encode5(): void
    {
        $v = [
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

        $r = json_encode($v, JSON_UNESCAPED_UNICODE); // JSON_UNESCAPED_UNICODEをつけると漢字も表示可能に

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_680_json_encode6(): void
    {
        $v = [
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

        $r = json_encode($v, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT); // JSON_PRETTY_PRINTをつけると整形される

        $expected = '{
    "東京都": {
        "2010": 13159388,
        "2015": 13515271,
        "2020": 14047594
    },
    "大阪府": {
        "2010": 8865245,
        "2015": 8839469,
        "2020": 8837685
    },
    "愛知県": {
        "2010": 7410719,
        "2015": 7483128,
        "2020": 7542415
    }
}';

        $this->assertSame($expected, $r);
    }

    // json_decode 45
    public function test_200_690_json_decode(): void
    {
        $v = '{"東京都":{"2010":13159388,"2015":13515271,"2020":14047594},"大阪府":{"2010":8865245,"2015":8839469,"2020":8837685},"愛知県":{"2010":7410719,"2015":7483128,"2020":7542415}}';

        $expected = [
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

        $r = json_decode($v, true); // 末尾にtrueをつけると配列で帰る
        $this->assertSame($expected, $r);
    }

    // rtrim 16
    public function test_200_700_rtrim(): void
    {
        $r = rtrim("\n This is trimmed text.  \n");

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // strip_tags  5
    public function test_200_710_strip_tags(): void
    {
        $r = strip_tags('<p>お問い合わせは<b><a href="#">こちら</a></b></p>');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // preg_split  3
    public function test_200_720_preg_split1(): void
    {
        // １文字ごとに切る
        $r = preg_split("//u", "電話番号は 090-1234-5678 です。", -1, PREG_SPLIT_NO_EMPTY);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_730_preg_split2(): void
    {
        // 母音で切る
        $r = preg_split("/[aiueo]+/", "korewa nihongo desu");

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // str_repeat  2
    public function test_200_740_str_repeat(): void
    {
        $r = str_repeat('*', 5);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // strtr 2
    public function test_200_750_strtr(): void
    {
        $r = strtr('abc', 'c', 'C');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_200_760_strtr_jp(): void
    {
        $r = strtr('あいう', 'う', 'ウ');

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertNotSame($a, $r); // 日本語には利用不可
    }

    // sscanf  4
    public function test_200_770_sscanf(): void
    {
        $r = sscanf('time=12:34.5', "time=%d:%d.%d");

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // number_format 7
    public function test_200_780_number_format(): void
    {
        $r = number_format(1234567890);

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // nl2br 30
    public function test_200_790_nl2br(): void
    {
        $r = nl2br("これは\n改行付きの\nテキスト\nです");

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    // md5 7
    public function test_200_800_md5(): void
    {
        $v = "secret";
        $r = md5($v);
        $encrypted = "5ebe2294ecd0e0f08eab7690d2a6ee69";

        $this->assertSame($encrypted, $r);
    }

    // sha1  5
    public function test_200_810_sha1(): void
    {
        $v = "secret";
        $r = sha1($v);
        $encrypted = "e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4";

        $this->assertSame($encrypted, $r);
    }

}

