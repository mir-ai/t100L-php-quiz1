<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

// String 関数
// https://www.php.net/manual/ja/ref.strings.php

// マルチバイト文字列 関数
// https://www.php.net/manual/ja/ref.mbstring.php
class U200StringFunctionsTest extends TestCase
{
    // 
    public function test_200_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // trim  461
    public function test_200_020_trim1(): void
    {
        $actual = trim(" This is trimmed text.  \n");

        // QUIZ
        $expected = "This is trimmed text.";
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // sprintf 89
    public function test_200_030_sprintf_pad_zero(): void
    {
        $actual = sprintf("%04d", 1);

        $expected = '0001';

        $this->assertSame($expected, $actual);
    }

    public function test_200_031_sprintf_pad_zero2(): void
    {
        $actual = sprintf("%05d", 2);

        // QUIZ
        $expected = '00002';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_040_sprintf_zero_pad_str(): void
    {
        $actual = sprintf("%04s",'A');

        $expected = '000A';

        $this->assertSame($expected, $actual);
    }

    public function test_200_041_sprintf_zero_pad_str2(): void
    {
        $actual = sprintf("%05s",'B');

        // QUIZ
        $expected = '0000B';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_050_sprintf_zero_pad_space(): void
    {
        $actual = sprintf("%4s",'A');

        $expected = '   A';

        $this->assertSame($expected, $actual);
    }

    public function test_200_051_sprintf_zero_pad_space2(): void
    {
        $actual = sprintf("%5s",'B');

        // QUIZ
        $expected = '    B';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // mb_convert_kana 75
    // https://www.php.net/manual/ja/function.mb-convert-kana.php
    public function test_200_060_mb_convert_kana_r(): void
    {
        //r	「全角」英字を「半角」に変換します。
        $actual = mb_convert_kana('ＡＢＣ', 'r');

        $expected = 'ABC';

        $this->assertSame($expected, $actual);
    }

    public function test_200_070_mb_convert_kana_R2(): void
    {
        //R	「半角」英字を「全角」に変換します。
        $actual = mb_convert_kana('ABC', 'R');

        // QUIZ
        $expected = 'ＡＢＣ';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_080_mb_convert_kana_n(): void
    {
        //n	「全角」数字を「半角」に変換します。
        $actual = mb_convert_kana('１２３', 'n');

        // QUIZ
        $expected = '123';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_090_mb_convert_kana_N2(): void
    {
        //N	「半角」数字を「全角」に変換します。
        $actual = mb_convert_kana('123', 'N');

        $expected = '１２３';

        $this->assertSame($expected, $actual);
    }

    public function test_200_100_mb_convert_kana_a(): void
    {
        //a	「全角」英数字を「半角」に変換します。
        $actual = mb_convert_kana('１２３ａｂｃ', 'a');

        // QUIZ
        $expected = '123abc';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_110_mb_convert_kana_A2(): void
    {
        //A	「半角」英数字を「全角」に変換します （"a", "A" オプションに含まれる文字は、U+0022, U+0027, U+005C, U+007Eを除く U+0021 - U+007E の範囲です）。
        $actual = mb_convert_kana('123abc', 'A');

        $expected = '１２３ａｂｃ';

        $this->assertSame($expected, $actual);
    }

    public function test_200_120_mb_convert_kana_s(): void
    {
        //s	「全角」スペースを「半角」に変換します（U+3000 -> U+0020）。
        $actual = mb_convert_kana('　', 's');

        $expected = ' ';

        $this->assertSame($expected, $actual);
    }

    public function test_200_130_mb_convert_kana_S2(): void
    {
        //S	「半角」スペースを「全角」に変換します（U+0020 -> U+3000）。
        $actual = mb_convert_kana(' ', 'S');

        // QUIZ
        $expected = '　';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_140_mb_convert_kana_k(): void
    {
        //k	「全角カタカナ」を「半角カタカナ」に変換します。
        $actual = mb_convert_kana('アイウ', 'k');

        $expected = 'ｱｲｳ';

        $this->assertSame($expected, $actual);
    }

    public function test_200_150_mb_convert_kana_K2(): void
    {
        //K	「半角カタカナ」を「全角カタカナ」に変換します。
        $actual = mb_convert_kana('ｱｲｳ', 'K');

        // QUIZ
        $expected = 'アイウ';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_160_mb_convert_kana_h(): void
    {
        //h	「全角ひらがな」を「半角カタカナ」に変換します。
        $actual = mb_convert_kana('あいう', 'h');

        $expected = 'ｱｲｳ';

        $this->assertSame($expected, $actual);
    }

    public function test_200_170_mb_convert_kana_H2(): void
    {
        //H	「半角カタカナ」を「全角ひらがな」に変換します。
        $actual = mb_convert_kana('ｱｲｳ', 'H');

        // QUIZ
        $expected = 'あいう';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_180_mb_convert_kana_c(): void
    {
        //c	「全角カタカナ」を「全角ひらがな」に変換します。
        $actual = mb_convert_kana('アイウ', 'c');

        $expected = 'あいう';

        $this->assertSame($expected, $actual);
    }

    public function test_200_190_mb_convert_kana_C2(): void
    {
        //C	「全角ひらがな」を「全角カタカナ」に変換します。
        $actual = mb_convert_kana('あいう', 'C');

        // QUIZ
        $expected = 'アイウ';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_200_mb_convert_kana_KV(): void
    {
        //V	濁点付きの文字を一文字に変換します。"K", "H" と共に使用します。        
        $actual = mb_convert_kana('ｶﾞｷﾞｸﾞｹﾞｺﾞ', 'KV');

        // QUIZ
        $expected = 'ガギグゲゴ';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // strlen  44
    public function test_200_210_strlen(): void
    {
        $actual = strlen('abc');

        // QUIZ
        $expected = 3;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_220_strlen_jp(): void
    {
        $actual = strlen('あいう');

        // strlenは日本語不可なのでとんでもない値が入ります。
        // QUIZ
        $expected = 9;
        // /QUIZ

        $this->assertSame($expected, $actual); 
    }

    // mb_strlen 22
    public function test_200_230_mb_strlen_jp(): void
    {
        $actual = mb_strlen('あいう');

        // QUIZ
        $expected = 3;
        // /QUIZ

        $this->assertSame($expected, $actual); // mb_strlenは日本語OK
    }

    // mb_strwidth 2
    public function test_200_240_mb_strwidth(): void
    {
        $actual = mb_strwidth('あいうえお');

        $expected = 10;

        $this->assertSame($expected, $actual); // mb_strwidth 全角文字は2でカウント。
    }

    // strtolower  43
    public function test_200_250_strtolower(): void
    {
        $actual = strtolower('Abc');

        $expected = 'abc';

        $this->assertSame($expected, $actual);
    }

    public function test_200_260_strtolower_jp(): void
    {
        $actual = strtolower('Ａｂｃ');

        // strlenは日本語不可なので変更はかかりません。
        // QUIZ
        $expected = 'Ａｂｃ';
        // /QUIZ

        $this->assertSame($expected, $actual); 
    }

    // mb_strtolower 7
    public function test_200_270_mb_strtolower_jp(): void
    {
        $actual = mb_strtolower('Ａｂｃ');

        // QUIZ
        $expected = 'ａｂｃ';
        // /QUIZ

        $this->assertSame($expected, $actual); // mb_strtolower は日本語OK
    }

    // strtoupper  27
    public function test_200_280_strtoupper(): void
    {
        $actual = strtoupper('Abc');

        // QUIZ
        $expected = 'ABC';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_290_strtoupper_jp(): void
    {
        $actual = strtoupper('Ａｂｃ');

        // strtoupperも日本語は変更がかかりません。
        // QUIZ
        $expected = 'Ａｂｃ';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // mb_strtoupper 1
    public function test_200_300_mb_strtoupper_jp(): void
    {
        $actual = mb_strtoupper('Ａｂｃ');

        // QUIZ
        $expected = 'ＡＢＣ';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }
    
    // str_starts_with 114
    public function test_200_310_str_starts_with(): void
    {
        $actual = str_starts_with('This is a pen.', 'This is ');

        // QUIZ
        $expected = true;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_320_str_starts_with_jp(): void
    {
        $actual = str_starts_with('これは、ペンです。', 'これは、');

        // QUIZ
        $expected = true;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // str_ends_with 3
    public function test_200_330_str_ends_with(): void
    {
        $actual = str_ends_with('This is a pen.', ' pen.');

        // QUIZ
        $expected = true;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // str_contains  108
    public function test_200_340_str_contains(): void
    {
        $actual = str_contains('This is a pen.', ' is a ');

        // QUIZ
        $expected = true;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_350_str_contains_jp(): void
    {
        $actual = str_contains('これは、ペンです。', '、ペン');

        // QUIZ
        $expected = true;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // strpos  108
    public function test_200_360_strpos1(): void
    {
        $actual = strpos('abcde', 'a');

        // QUIZ
        $expected = 0;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_370_strpos2(): void
    {
        $actual = strpos('abcde', 'bc');

        // QUIZ
        $expected = 1;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_380_strpos3(): void
    {
        $actual = strpos('abcde', 'de');

        // QUIZ
        $expected = 3;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_390_strpos4_jp(): void
    {
        $actual = strpos('あいう', 'いう');

        // QUIZ
        $expected = 1;
        // /QUIZ

        $this->assertNotSame($expected, $actual); // 日本語には使えない
    }

    // mb_strpos 1
    public function test_200_400_mb_strpos1_jp(): void
    {
        $actual = mb_strpos('あいう', 'いう');

        // QUIZ
        $expected = 1;
        // /QUIZ

        $this->assertSame($expected, $actual); // mb_strpos は日本語OK
    }

    // substr  106
    public function test_200_410_substr1(): void
    {
        $actual = substr('abcde', 1);

        // QUIZ
        $expected = 'bcde';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_420_substr2(): void
    {
        $actual = substr('abcde', 1, 2);

        // QUIZ
        $expected = 'bc';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_430_substr3(): void
    {
        $actual = substr('abcde', -1);

        // QUIZ
        $expected = 'e';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_440_substr4(): void
    {
        $actual = substr('abcde', -2);

        // QUIZ
        $expected = 'de';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_450_substr5(): void
    {
        $actual = substr('abcde', -2, 1);

        // QUIZ
        $expected = 'd';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_460_substr6_jp(): void
    {
        $actual = substr('あいうえお', 1);

        // QUIZ
        $expected = 'いうえお';
        // /QUIZ

        $this->assertNotSame($expected, $actual); // substr 日本語には利用不可
    }

    // mb_substr 30
    public function test_200_470_mb_substr1_jp(): void
    {
        $actual = mb_substr('あいうえお', 1);

        // QUIZ
        $expected = 'いうえお';
        // /QUIZ

        $this->assertSame($expected, $actual); // mb_substr 日本語OK
    }

    public function test_200_480_mb_substr2_jp(): void
    {
        $actual = mb_substr('あいうえお', 1, 2);

        // QUIZ
        $expected = 'いう';
        // /QUIZ

        $this->assertSame($expected, $actual); // mb_substr 日本語OK
    }

    // str_replace 381
    public function test_200_490_str_replace1(): void
    {
        $actual = str_replace('cd', 'CD', 'abcdef');

        // QUIZ
        $expected = 'abCDef';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_500_str_replace2(): void
    {
        $actual = str_replace(['b', 'c'], ['B', 'C'], 'abcdef');

        // QUIZ
        $expected = 'aBCdef';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_510_str_replace3_jp(): void
    {
        $actual = str_replace('い', 'イ', 'あいうえお');

        // QUIZ
        $expected = 'あイうえお';
        // /QUIZ

        $this->assertSame($expected, $actual); // 日本語も利用可能
    }

    public function test_200_520_str_replace4_jp(): void
    {
        $actual = str_replace(['う', 'え'], ['ウ', 'エ'], 'あいうえお');

        // QUIZ
        $expected = 'あいウエお';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_530_str_replace5_jp(): void
    {
        // 複数の文字列の変換を行った場合、変換結果に対して変換を重ねる。
        // 予期せぬ結果に注意。('1'=>'one', 'one'=>'two')
        $actual = str_replace(['1', 'one'], ['one', 'two'], '1');

        // QUIZ
        $expected = 'two';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }
    
    // preg_replace  56
    public function test_200_540_preg_replace1(): void
    {
        $actual = preg_replace('/\s+/', '-', 'This is  a  pen.'); //連続する空白を - にする

        // QUIZ
        $expected = 'This-is-a-pen.';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_550_preg_replace2(): void
    {
        $actual = preg_replace('/[^0-9]/', '', '090-1234-5678'); //数字以外を削除

        // QUIZ
        $expected = '09012345678';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // mb_ereg_replace 23
    public function test_200_560_mb_ereg_replace1(): void
    {
        // さまざまなハイフンらしきものを - に統一する
        $actual = mb_ereg_replace("[‐‑–—―−ｰ]", "-", '‐‑–—―−ｰ');

        // QUIZ
        $expected = '-------';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_570_mb_ereg_replace2(): void
    {
        // さまざまなクオーティーションらしきものを - に統一する
        $actual = mb_ereg_replace("[´’‘゜'“´”\"\❛]", "'", "´’‘゜'“´”\"❛");

        // QUIZ
        $expected = "''''''''''";
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_580_mb_ereg_replace3(): void
    {
        // 全角カタカナのみを残したい
        $actual = mb_ereg_replace("[^ァ-ヶ]", "", "アイウエオかきくけこＡＢＣabc");

        // QUIZ
        $expected = "アイウエオ";
        // /QUIZ

        $this->assertSame($expected, $actual);
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
        $expected = ['26', '02', '28'];
        // /QUIZ

        $this->assertSame($expected, [$n1, $n2, $n3]);
    }    

    public function test_200_600_preg_match2(): void
    {
        // ひらがなを含む
        $has_hiragana = preg_match('/[ぁ-ん]/u', 'イチニチイチゼン一日一善', $match);

        // QUIZ
        $expected = 0;
        // /QUIZ

        $this->assertSame($expected, $has_hiragana);
    }    
    
    // preg_match_all  2
    public function test_200_610_preg_match_all(): void
    {
        preg_match_all('/v=(\d+)/', 'v=1, v=20, v=300', $matches);
        $actual = $matches;

        // QUIZ
        $expected = [["v=1", "v=20", "v=300"], ["1", "20", "300"]];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // mb_ereg 30
    public function test_200_620_mb_ereg(): void
    {
        mb_ereg('ｖ=(\d+)', 'ｖ=1, ｖ=20, ｖ=300', $matches);
        $actual = $matches;

        // QUIZ
        $expected = ["ｖ=1", "1"];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // json_encode 48
    public function test_200_630_json_encode1(): void
    {
        $v = [1, 2, 3];
        $actual = json_encode($v);

        // QUIZ
        $expected = '[1,2,3]';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_640_json_encode2(): void
    {
        $v = ['a', 'b', 'c'];
        $actual = json_encode($v);

        // QUIZ
        $expected = '["a","b","c"]';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_650_json_encode3(): void
    {
        $v = [
            'Tokyo'  => 14047594, 
            'Osaka' =>  8837685, 
            'Aichi'  => 7542415,
        ];
        $actual = json_encode($v);

        // QUIZ
        $expected = '{"Tokyo":14047594,"Osaka":8837685,"Aichi":7542415}';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_660_json_encode4(): void
    {
        $v = [
            '東京都'  => 14047594, 
            '大阪府' =>  8837685, 
            '愛知県'  => 7542415,
        ];
        $actual = json_encode($v); // 漢字はエスケープされてしまう

        $expected = '{"\u6771\u4eac\u90fd":14047594,"\u5927\u962a\u5e9c":8837685,"\u611b\u77e5\u770c":7542415}';

        $this->assertSame($expected, $actual);
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

        $actual = json_encode($v, JSON_UNESCAPED_UNICODE); // JSON_UNESCAPED_UNICODEをつけると漢字も表示可能に

        $expected = '{"東京都":{"2010":13159388,"2015":13515271,"2020":14047594},"大阪府":{"2010":8865245,"2015":8839469,"2020":8837685},"愛知県":{"2010":7410719,"2015":7483128,"2020":7542415}}';
        
        $this->assertSame($expected, $actual);
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

        $actual = json_encode($v, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT); // JSON_PRETTY_PRINTをつけると整形される

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

        $this->assertSame($expected, $actual);
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

        $actual = json_decode($v, true); // 末尾にtrueをつけると配列で帰る
        $this->assertSame($expected, $actual);
    }    

    // rtrim 16
    public function test_200_700_rtrim(): void
    {
        $actual = rtrim("\n This is trimmed text.  \n");

        // QUIZ
        $expected = "\n This is trimmed text.";
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // strip_tags  5
    public function test_200_710_strip_tags(): void
    {
        $actual = strip_tags('<p>お問い合わせは<b><a href="#">こちら</a></b></p>');

        // QUIZ
        $expected = "お問い合わせはこちら";
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // preg_split  3
    public function test_200_720_preg_split1(): void
    {
        // １文字ごとに切る
        $actual = preg_split("//u", "電話番号は 090-1234-5678 です。", -1, PREG_SPLIT_NO_EMPTY);

        // QUIZ
        $expected = ['電','話','番','号','は',' ','0','9','0','-','1','2','3','4','-','5','6','7','8',' ','で','す','。'];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_730_preg_split2(): void
    {
        // 母音で切る
        $actual = preg_split("/[aiueo]+/", "korewa nihongo desu");

        // QUIZ
        $expected = ['k', 'r','w',' n','h','ng',' d','s',''];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // str_repeat  2
    public function test_200_740_str_repeat(): void
    {
        $actual = str_repeat('*', 5);

        // QUIZ
        $expected = '*****';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // strtr 2
    public function test_200_750_strtr(): void
    {
        $actual = strtr('abc', 'c', 'C');

        // QUIZ
        $expected = 'abC';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    public function test_200_760_strtr_jp(): void
    {
        $actual = strtr('あいう', 'う', 'ウ');
        $expected = 'もやウ';

        $this->assertSame($expected, $actual); // 日本語には利用不可!!!
    }
    
    public function test_200_760_strtr_recursive(): void
    {
        $actual = strtr('one', ['one' => 'two', 'two' => 'three']);

        // 一度置換した結果は、再び置換されない
        // QUIZ
        $expected = 'two';
        // /QUIZ

        $this->assertSame($expected, $actual); // 日本語には利用不可
    }
    
    // sscanf  4
    public function test_200_770_sscanf(): void
    {
        $actual = sscanf('time=12:34.5', "time=%d:%d.%d");

        // QUIZ
        $expected = [12, 34, 5];
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // number_format 7
    public function test_200_780_number_format(): void
    {
        $actual = number_format(1234567890);

        // QUIZ
        $expected = '1,234,567,890';
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // nl2br 30
    public function test_200_790_nl2br(): void
    {
        $actual = nl2br("これは\n改行付きの\nテキスト\nです");

        // QUIZ
        $expected = "これは<br />\n改行付きの<br />\nテキスト<br />\nです";
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // md5 7
    public function test_200_800_md5(): void
    {
        $v = "secret";
        $actual = md5($v);
        $encrypted = "5ebe2294ecd0e0f08eab7690d2a6ee69";

        $this->assertSame($encrypted, $actual);
    }

    // sha1  5
    public function test_200_810_sha1(): void
    {
        $v = "secret";
        $actual = sha1($v);
        $encrypted = "e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4";

        $this->assertSame($encrypted, $actual);
    }

}

