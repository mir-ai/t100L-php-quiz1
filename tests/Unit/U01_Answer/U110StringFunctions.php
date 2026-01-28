<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U110StringFunctions extends TestCase
{
    // 
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // trim  461
    public function test_trim1(): void
    {
        $r = trim(" This is trimmed text.  \n");
        $this->assertSame("This is trimmed text.", $r);
    }

    // sprintf 89
    public function test_sprintf_pad_zero(): void
    {
        $r = sprintf("%04d", 1);
        $this->assertSame('0001', $r);
    }

    public function test_sprintf_zero_pad_str(): void
    {
        $r = sprintf("%04s",'A');
        $this->assertSame('000A', $r);
    }

    public function test_sprintf_zero_pad_space(): void
    {
        $r = sprintf("%4s",'A');
        $this->assertSame('   A', $r);
    }

    // mb_convert_kana 75
    public function test_mb_convert_kana_1(): void
    {
        //r	「全角」英字を「半角」に変換します。
        $r = mb_convert_kana('ＡＢＣ', 'r');
        $this->assertSame('ABC', $r);

        //R	「半角」英字を「全角」に変換します。
        $r = mb_convert_kana('ABC', 'R');
        $this->assertSame('ＡＢＣ', $r);

        //n	「全角」数字を「半角」に変換します。
        $r = mb_convert_kana('１２３', 'n');
        $this->assertSame('123', $r);

        //N	「半角」数字を「全角」に変換します。
        $r = mb_convert_kana('123', 'N');
        $this->assertSame('１２３', $r);

        //a	「全角」英数字を「半角」に変換します。
        $r = mb_convert_kana('１２３ａｂｃ', 'a');
        $this->assertSame('123abc', $r);

        //A	「半角」英数字を「全角」に変換します （"a", "A" オプションに含まれる文字は、U+0022, U+0027, U+005C, U+007Eを除く U+0021 - U+007E の範囲です）。
        $r = mb_convert_kana('123abc', 'A');
        $this->assertSame('１２３ａｂｃ', $r);

        //s	「全角」スペースを「半角」に変換します（U+3000 -> U+0020）。
        $r = mb_convert_kana('　', 's');
        $this->assertSame(' ', $r);

        //S	「半角」スペースを「全角」に変換します（U+0020 -> U+3000）。
        $r = mb_convert_kana(' ', 'S');
        $this->assertSame('　', $r);

        //k	「全角カタカナ」を「半角カタカナ」に変換します。
        $r = mb_convert_kana('アイウ', 'k');
        $this->assertSame('ｱｲｳ', $r);

        //K	「半角カタカナ」を「全角カタカナ」に変換します。
        $r = mb_convert_kana('ｱｲｳ', 'K');
        $this->assertSame('アイウ', $r);

        //h	「全角ひらがな」を「半角カタカナ」に変換します。
        $r = mb_convert_kana('あいう', 'h');
        $this->assertSame('ｱｲｳ', $r);

        //H	「半角カタカナ」を「全角ひらがな」に変換します。
        $r = mb_convert_kana('ｱｲｳ', 'H');
        $this->assertSame('あいう', $r);

        //c	「全角カタカナ」を「全角ひらがな」に変換します。
        $r = mb_convert_kana('アイウ', 'c');
        $this->assertSame('あいう', $r);

        //C	「全角ひらがな」を「全角カタカナ」に変換します。
        $r = mb_convert_kana('あいう', 'C');
        $this->assertSame('アイウ', $r);

        //V	濁点付きの文字を一文字に変換します。"K", "H" と共に使用します。        
        $r = mb_convert_kana('ｶﾞｷﾞｸﾞｹﾞｺﾞ', 'KV');
        $this->assertSame('ガギグゲゴ', $r);
    }

    // strlen  44
    public function test_strlen(): void
    {
        $r = strlen('abc');
        $this->assertSame(3, $r);
    }

    public function test_strlen_jp(): void
    {
        $r = strlen('あいう');
        $this->assertNotSame(3, $r); // strlenは日本語不可
    }

    // mb_strlen 22
    public function test_mb_strlen_jp(): void
    {
        $r = mb_strlen('あいう');
        $this->assertSame(3, $r); // mb_strlenは日本語OK
    }

    // mb_strwidth 2
    public function test_mb_strwidth(): void
    {
        $r = mb_strwidth('あいうえお');
        $this->assertSame(10, $r); // mb_strwidth 全角文字は2でカウント。
    }

    // strtolower  43
    public function test_strtolower(): void
    {
        $r = strtolower('Abc');
        $this->assertSame('abc', $r);
    }

    public function test_strtolower_jp(): void
    {
        $r = strtolower('Ａｂｃ');
        $this->assertNotSame('ａｂｃ', $r); // strtolower は日本語不可
    }

    // mb_strtolower 7
    public function test_mb_strtolower_jp(): void
    {
        $r = mb_strtolower('Ａｂｃ');
        $this->assertSame('ａｂｃ', $r); // mb_strtolower は日本語OK
    }

    // strtoupper  27
    public function test_strtoupper(): void
    {
        $r = strtoupper('Abc');
        $this->assertSame('ABC', $r);
    }

    public function test_strtoupper_jp(): void
    {
        $r = strtoupper('Ａｂｃ');
        $this->assertNotSame('ＡＢＣ', $r);
    }

    // mb_strtoupper 1
    public function test_mb_strtoupper_jp(): void
    {
        $r = mb_strtoupper('Ａｂｃ');
        $this->assertSame('ＡＢＣ', $r);
    }
    
    // str_starts_with 114
    public function test_str_starts_with(): void
    {
        $r = str_starts_with('This is a pen.', 'This is ');
        $this->assertTrue($r);
    }

    public function test_str_starts_with_jp(): void
    {
        $r = str_starts_with('これは、ペンです。', 'これは、');
        $this->assertTrue($r);
    }

    // str_ends_with 3
    public function test_str_ends_with(): void
    {
        $r = str_ends_with('This is a pen.', ' pen.');
        $this->assertTrue($r);
    }

    // str_contains  108
    public function test_str_contains(): void
    {
        $r = str_contains('This is a pen.', ' is a ');
        $this->assertTrue($r);
    }

    public function test_str_contains_jp(): void
    {
        $r = str_contains('これは、ペンです。', '、ペン');
        $this->assertTrue($r);
    }

    // strpos  108
    public function test_strpos1(): void
    {
        $r = strpos('abcde', 'a');
        $this->assertSame(0, $r);
    }

    public function test_strpos2(): void
    {
        $r = strpos('abcde', 'bc');
        $this->assertSame(1, $r);
    }

    public function test_strpos3(): void
    {
        $r = strpos('abcde', 'de');
        $this->assertSame(3, $r);
    }

    public function test_strpos4_jp(): void
    {
        $r = strpos('あいう', 'いう');
        $this->assertNotSame(1, $r); // 日本語には使えない
    }

    // mb_strpos 1
    public function test_mb_strpos1_jp(): void
    {
        $r = mb_strpos('あいう', 'いう');
        $this->assertSame(1, $r); // mb_strpos は日本語OK
    }

    // substr  106
    public function test_substr1(): void
    {
        $r = substr('abcde', 1);
        $this->assertSame('bcde', $r);
    }

    public function test_substr2(): void
    {
        $r = substr('abcde', 1, 2);
        $this->assertSame('bc', $r);
    }

    public function test_substr3(): void
    {
        $r = substr('abcde', -1);
        $this->assertSame('e', $r);
    }

    public function test_substr4(): void
    {
        $r = substr('abcde', -2);
        $this->assertSame('de', $r);
    }

    public function test_substr5(): void
    {
        $r = substr('abcde', -2, 1);
        $this->assertSame('d', $r);
    }

    public function test_substr6_jp(): void
    {
        $r = substr('あいうえお', 1);
        $this->assertNotSame('いうえお', $r); // substr 日本語には利用不可
    }

    // mb_substr 30
    public function test_mb_substr1_jp(): void
    {
        $r = mb_substr('あいうえお', 1);
        $this->assertSame('いうえお', $r); // mb_substr 日本語OK
    }

    public function test_mb_substr2_jp(): void
    {
        $r = mb_substr('あいうえお', 1, 2);
        $this->assertSame('いう', $r); // mb_substr 日本語OK
    }

    // str_replace 381
    public function test_str_replace1(): void
    {
        $r = str_replace('cd', 'CD', 'abcdef');
        $this->assertSame('abCDef', $r);
    }

    public function test_str_replace2(): void
    {
        $r = str_replace(['b', 'c'], ['B', 'C'], 'abcdef');
        $this->assertSame('aBCdef', $r);
    }

    public function test_str_replace3_jp(): void
    {
        $r = str_replace('い', 'イ', 'あいうえお');
        $this->assertSame('あイうえお', $r); // 日本語も利用可能
    }

    public function test_str_replace4_jp(): void
    {
        $r = str_replace(['う', 'え'], ['ウ', 'エ'], 'あいうえお');
        $this->assertSame('あいウエお', $r);
    }

    public function test_str_replace5_jp(): void
    {
        // 複数の文字列の変換を行った場合、変換結果に対して変換を重ねる。
        // 予期せぬ結果に注意。('1'=>'one', 'one'=>'two')
        $r = str_replace(['1', 'one'], ['one', 'two'], '1');
        $this->assertSame('two', $r);
    }
    
    // preg_replace  56
    public function test_preg_replace1(): void
    {
        $r = preg_replace('/\s+/', '-', 'This is  a  pen.'); //連続する空白を - にする
        $this->assertSame('This-is-a-pen.', $r);
    }

    public function test_preg_replace2(): void
    {
        $r = preg_replace('/[^0-9]/', '', '090-1234-5678'); //数字以外を削除
        $this->assertSame('09012345678', $r);
    }

    // mb_ereg_replace 23
    public function test_mb_ereg_replace1(): void
    {
        // さまざまなハイフンらしきものを - に統一する
        $r = mb_ereg_replace("[‐‑–—―−ｰ]", "-", '‐‑–—―−ｰ');
        $this->assertSame('-------', $r);
    }

    public function test_mb_ereg_replace2(): void
    {
        // さまざまなクオーティーションらしきものを - に統一する
        $r = mb_ereg_replace("[´’‘゜'“´”\"\❛]", "'", "´’‘゜'“´”\"❛");
        $this->assertSame("''''''''''", $r);
    }

    public function test_mb_ereg_replace3(): void
    {
        // 全角カタカナのみを残したい
        $r = mb_ereg_replace("[^ァ-ヶ]", "", "アイウエオかきくけこＡＢＣabc");
        $this->assertSame("アイウエオ", $r);
    }

    // preg_match  54
    public function test_preg_match1(): void
    {
        $pattern = '/Y(\d\d)_M(\d\d)_D(\d\d)/';
        $v = 'Y26_M02_D28';
        $n1 = $n2 = $n3 = $n4 = '';
        if (preg_match($pattern, $v, $matches) !== false) {
            $n1 = $matches[1] ?? '';
            $n2 = $matches[2] ?? '';
            $n3 = $matches[3] ?? '';
        };

        $this->assertSame(['26', '02', '28'], [$n1, $n2, $n3]);
    }    

    public function test_preg_match2(): void
    {
        // ひらがなを含む
        $has_hiragana = preg_match('/[ぁ-ん]/u', 'イチニチイチゼン一日一善', $match);

        $this->assertSame(0, $has_hiragana);
    }    
    
    // preg_match_all  2
    public function test_preg_match_all(): void
    {
        $r = preg_match_all('/v=(\d+)/', 'v=1, v=20, v=300', $matches);

        $this->assertSame([["v=1", "v=20", "v=300"], ["1", "20", "300"]], $matches);
    }

    // mb_ereg 30
    public function test_mb_ereg(): void
    {
        $r = mb_ereg('ｖ=(\d+)', 'ｖ=1, ｖ=20, ｖ=300', $matches);
        $this->assertSame(["ｖ=1", "1"], $matches);
    }

    // json_encode 48
    public function test_json_encode1(): void
    {
        $v = [1,2,3];
        $r = json_encode($v);
        $this->assertSame('[1,2,3]', $r);
    }

    public function test_json_encode2(): void
    {
        $v = ['a', 'b', 'c'];
        $r = json_encode($v);
        $this->assertSame('["a","b","c"]', $r);
    }

    public function test_json_encode3(): void
    {
        $v = [
            'Tokyo'  => 14047594, 
            'Osaka' =>  8837685, 
            'Aichi'  => 7542415,
        ];
        $r = json_encode($v);
        $this->assertSame('{"Tokyo":14047594,"Osaka":8837685,"Aichi":7542415}', $r);
    }

    public function test_json_encode4(): void
    {
        $v = [
            '東京都'  => 14047594, 
            '大阪府' =>  8837685, 
            '愛知県'  => 7542415,
        ];
        $r = json_encode($v); // 漢字はエスケープされてしまう
        $this->assertSame('{"\u6771\u4eac\u90fd":14047594,"\u5927\u962a\u5e9c":8837685,"\u611b\u77e5\u770c":7542415}', $r);
    }

    public function test_json_encode5(): void
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
        $this->assertSame('{"東京都":{"2010":13159388,"2015":13515271,"2020":14047594},"大阪府":{"2010":8865245,"2015":8839469,"2020":8837685},"愛知県":{"2010":7410719,"2015":7483128,"2020":7542415}}', $r);
    }

    public function test_json_encode6(): void
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
    public function test_json_decode(): void
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
    public function test_rtrim(): void
    {
        $r = rtrim("\n This is trimmed text.  \n");
        $this->assertSame("\n This is trimmed text.", $r);
    }

    // strip_tags  5
    public function test_strip_tags(): void
    {
        $r = strip_tags('<p>お問い合わせは<b><a href="#">こちら</a></b></p>');
        $this->assertSame("お問い合わせはこちら", $r);
    }

    // preg_split  3
    public function test_preg_split1(): void
    {
        // １文字ごとに切る
        $r = preg_split("//u", "電話番号は 090-1234-5678 です。", -1, PREG_SPLIT_NO_EMPTY);
        $this->assertSame(['電','話','番','号','は',' ','0','9','0','-','1','2','3','4','-','5','6','7','8',' ','で','す','。'], $r);
    }

    public function test_preg_split2(): void
    {
        // 母音で切る
        $r = preg_split("/[aiueo]+/", "korewa nihongo desu");
        $this->assertSame(['k', 'r','w',' n','h','ng',' d','s',''], $r);
    }

    // str_repeat  2
    public function test_str_repeat(): void
    {
        $r = str_repeat('*', 3);
        $this->assertSame('***', $r);
    }

    // strtr 2
    public function test_strtr(): void
    {
        $r = strtr('abc', 'c', 'C');
        $this->assertSame('abC', $r);
    }

    public function test_strtr_jp(): void
    {
        $r = strtr('あいう', 'う', 'ウ');
        $this->assertNotSame('あいウ', $r); // 日本語には利用不可
    }
    
    // sscanf  4
    public function test_sscanf(): void
    {
        $r = sscanf('time=12:34.5', "time=%d:%d.%d");
        $this->assertSame([12, 34, 5], $r);
    }

    // number_format 7
    public function test_number_format(): void
    {
        $r = number_format(1234567890);

        $this->assertSame('1,234,567,890', $r);
    }

    // nl2br 30
    public function test_nl2br(): void
    {
        $r = nl2br("これは\n改行付きの\nテキスト\nです");

        $this->assertSame("これは<br />\n改行付きの<br />\nテキスト<br />\nです", $r);
    }

    // md5 7
    public function test_md5(): void
    {
        $v = "secret";
        $r = md5($v);
        $encrypted = "5ebe2294ecd0e0f08eab7690d2a6ee69";

        $this->assertSame($encrypted, $r);
    }

    // sha1  5
    public function test_sha1(): void
    {
        $v = "secret";
        $r = sha1($v);
        $encrypted = "e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4";

        $this->assertSame($encrypted, $r);
    }

}

