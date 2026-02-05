<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U410ReplaceTest extends TestCase
{
    //
    public function test_400_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // 実務課題 : 文字列について、複数の単語の置換を行う。再帰的な置き換えはしない。

    // 例：
    // 元の文：浜名区、北区が対象です。
    // 置換： 浜名区→浜北区、北区→中央区
    // OK: 浜北区、中央区が対象です。
    // NG: 浜中央区、中央区が対象です。（一度浜名区→浜北区と置き換えたものを、再度北区→中央区と置き換えてしまうのはNG）

    private function getInput(): string
    {
        return '浜名区、北区が対象です。';
    }

    // 結果はこれになります。
    private function getOutput(): string
    {
        return '浜北区、中央区GA対象DESU。';
    }

    private function getReplaces(): array
    {
        return [
            '浜名区' => '浜北区',
            '北区' => '中央区',
            'あ' => 'A',
            'い' => 'I',
            'う' => 'U',
            'え' => 'E',
            'お' => 'O',
            'きゃ' => 'KYA',
            'きぃ' => 'KYI',
            'きゅ' => 'KYU',
            'きぇ' => 'KYE',
            'きょ' => 'KYO',
            'か' => 'KA',
            'き' => 'KI',
            'く' => 'KU',
            'け' => 'KE',
            'こ' => 'KO',
            'くぁ' => 'QA',
            'くぃ' => 'QI',
            'くぅ' => 'QWU',
            'くぇ' => 'QE',
            'くぉ' => 'QO',
            'が' => 'GA',
            'ぎ' => 'GI',
            'ぐ' => 'GU',
            'げ' => 'GE',
            'ご' => 'GO',
            'ぎゃ' => 'GYA',
            'ぎぃ' => 'GYI',
            'ぎゅ' => 'GYU',
            'ぎぇ' => 'GYE',
            'ぎょ' => 'GYO',
            'さ' => 'SA',
            'し' => 'SI',
            'す' => 'SU',
            'せ' => 'SE',
            'そ' => 'SO',
            'ぐぁ' => 'GWA',
            'ぐぃ' => 'GWI',
            'ぐぅ' => 'GWU',
            'ぐぇ' => 'GWE',
            'ぐぉ' => 'GWO',
            'ざ' => 'ZA',
            'じ' => 'ZI',
            'ず' => 'ZU',
            'ぜ' => 'ZE',
            'ぞ' => 'ZO',
            'しゃ' => 'SYA',
            'しぃ' => 'SYI',
            'しゅ' => 'SYU',
            'しぇ' => 'SYE',
            'しょ' => 'SYO',
            'た' => 'TA',
            'ち' => 'TI',
            'つ' => 'TU',
            'て' => 'TE',
            'と' => 'TO',
            'すぁ' => 'SWA',
            'すぃ' => 'SWI',
            'すぅ' => 'SWU',
            'すぇ' => 'SWE',
            'すぉ' => 'SWO',
            'だ' => 'DA',
            'ぢ' => 'DI',
            'づ' => 'DU',
            'で' => 'DE',
            'ど' => 'DO',
            'じゃ' => 'JA',
            'じぃ' => 'ZYI',
            'じゅ' => 'JU',
            'じぇ' => 'JE',
            'じょ' => 'JO',
            'な' => 'NA',
            'に' => 'NI',
            'ぬ' => 'NU',
            'ね' => 'NE',
            'の' => 'NO',
            'ちゃ' => 'TYA',
            'ちぃ' => 'TYI',
            'ちゅ' => 'TYU',
            'ちぇ' => 'TYE',
            'ちょ' => 'TYO',
            'は' => 'HA',
            'ひ' => 'HI',
            'ふ' => 'HU',
            'へ' => 'HE',
            'ほ' => 'HO',
            'てゃ' => 'THA',
            'てぃ' => 'THI',
            'てゅ' => 'THU',
            'てぇ' => 'THE',
            'てょ' => 'THO',
            'ば' => 'BA',
            'び' => 'BI',
            'ぶ' => 'BU',
            'べ' => 'BE',
            'ぼ' => 'BO',
            'とぁ' => 'TWA',
            'とぃ' => 'TWI',
            'とぅ' => 'TWO',
            'とぇ' => 'TWE',
            'とぉ' => 'TWO',
            'ぱ' => 'PA',
            'ぴ' => 'PI',
            'ぷ' => 'PU',
            'ぺ' => 'PE',
            'ぽ' => 'PO',
            'ぢゃ' => 'DYA',
            'ぢぃ' => 'DYI',
            'ぢゅ' => 'DYU',
            'ぢぇ' => 'DYE',
            'ぢょ' => 'DYO',
            'ま' => 'MA',
            'み' => 'MI',
            'む' => 'MU',
            'め' => 'ME',
            'も' => 'MO',
            'でゃ' => 'DHA',
            'でぃ' => 'DHI',
            'でゅ' => 'DHU',
            'でぇ' => 'DHE',
            'でょ' => 'DHO',
            'や' => 'YA',
            'ゆ' => 'YU',
            'よ' => 'YO',
            'どぁ' => 'DWA',
            'どぃ' => 'DWI',
            'どぅ' => 'DWU',
            'どぇ' => 'DWE',
            'どぉ' => 'DWO',
            'ら' => 'RA',
            'り' => 'RI',
            'る' => 'RU',
            'れ' => 'RE',
            'ろ' => 'RO',
            'にゃ' => 'NYA',
            'にぃ' => 'NYI',
            'にゅ' => 'NYU',
            'にぇ' => 'NYE',
            'にょ' => 'NYO',
            'わ' => 'WA',
            'を' => 'WO',
            'ん' => 'NN',
            'ひゃ' => 'HYA',
            'ひぃ' => 'HYI',
            'ひゅ' => 'HYU',
            'ひぇ' => 'HYE',
            'ひょ' => 'HYO',
            'ぁ' => 'XA',
            'ぃ' => 'XI',
            'ぅ' => 'XU',
            'ぇ' => 'XE',
            'ぉ' => 'XO',
            'ふぁ' => 'FA',
            'ふぃ' => 'FI',
            'ふぅ' => 'FWU',
            'ふぇ' => 'FE',
            'ふぉ' => 'FO',
            'びゃ' => 'BYA',
            'びぃ' => 'BYI',
            'びゅ' => 'BYU',
            'びぇ' => 'BYE',
            'びょ' => 'BYO',
            'ぴゃ' => 'PYA',
            'ぴぃ' => 'PYI',
            'ぴゅ' => 'PYU',
            'ぴぇ' => 'PYE',
            'ぴょ' => 'PYO',
            'みゃ' => 'MYA',
            'みぃ' => 'MYI',
            'みゅ' => 'MYU',
            'みぇ' => 'MYE',
            'みょ' => 'MYO',
            'りゃ' => 'RYA',
            'りぃ' => 'RYI',
            'りゅ' => 'RYU',
            'りぇ' => 'RYE',
            'りょ' => 'RYO',
            'うぁ' => 'WHA',
            'うぃ' => 'WI',
            'うぇ' => 'WE',
            'うぉ' => 'WHO',
            'A' => 'Α',
            'B' => 'Β',
            'C' => 'Γ',
            'D' => 'Δ',
            'E' => 'Ε',
            'Z' => 'Ζ',
            'H' => 'Η',
            'I' => 'Ι',
            'K' => 'Κ',
            'L' => 'Λ',
            'M' => 'Μ',
            'N' => 'Ν',
            'O' => 'Ο',
            'P' => 'Π',
            'R' => 'Ρ',
            'S' => 'Σ',
            'T' => 'Τ',
            'V' => 'Υ',
            'X' => 'Χ',
        ];
    }


    // じぶんでやってみよう
    public function test_410_replace(): void
    {
        // 元データを読み込む
        $input = $this->getInput();

        // 置換テーブルを読み込む
        $replaces = $this->getReplaces();

        // 置き換えを実行する

        // NG例
        $actual = str_replace(
            array_keys($replaces),
            array_values($replaces),
            $input
        );

        // QUIZ

        // OK例
        $sanitize_table = [
            1 => '仼', 
            2 => '伀', 
            3 => '伃', 
            4 => '伹', 
            5 => '佖', 
            6 => '侊', 
            7 => '侒', 
            8 => '侔', 
            9 => '侚', 
            0 => '仡', 
        ];

        $sanitize_table_idx = array_keys($sanitize_table); // 0, 1, 2
        $sanitize_table_values = array_values($sanitize_table); // 仡, 仼, 伀

        $froms = array_keys($replaces);
        $safes = [];
        $tos = array_values($replaces);

        // Step2を作成する。
        // 仼伀伃伹佖侊侒侔侚仡 という普通出てこない漢字を使って安全な中間置換文字列を作る。
        // _仼仡仡仡仡仡_,  _仼仡仡仡仡仼_,  _仼仡仡仡仡伀_,  _仼仡仡仡仡伃_,  _仼仡仡仡仡伹_,  _仼仡仡仡仡佖_,  _仼仡仡仡仡侊_,  _仼仡仡仡仡侒_,  _仼仡仡仡仡侔_,....
        for ($i = 0; $i < count($replaces); $i++) {
            $safe_str = str_replace(
                $sanitize_table_idx, // 0, 1, 2, 
                $sanitize_table_values, // 仡, 仼, 伀
                (string)($i + 100000),
            ); //  
            $safes[] = "_{$safe_str}_";
  
        }

        $tmp = str_replace($froms, $safes, $input);
        $actual = str_replace($safes, $tos, $tmp);
        // /QUIZ

        $expected = $this->getOutput();

        $this->assertSame($expected, $actual);
    }

}        
