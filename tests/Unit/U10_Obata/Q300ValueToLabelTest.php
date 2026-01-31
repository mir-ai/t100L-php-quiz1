<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;

class Q300ValueToLabelTest extends TestCase
{
    //
    public function test_300_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // 値をラベルに変える 1 - ifを使う
    public function test_300_020_value_to_label_if(): void
    {
        /*
            'apple' => 'りんご',
            'orange' => 'オレンジ',
            'grape' => 'ぶどう',
        */

        $v = 'apple';

        $r = '不明';

        // if を使って 'apple' に該当する名前を $r に入れて下さい。
        // QUIZ
		$a = null;
        // /QUIZ

        $a = 'りんご';

        $this->assertSame($a, $r);
    }

    // 値をラベルに変える 2 - matchを使う
    public function test_300_030_value_to_label_match(): void
    {
        /*
            'apple' => 'りんご',
            'orange' => 'オレンジ',
            'grape' => 'ぶどう',
        */

        $v = 'apple';

        // match を使って 'apple' に該当する名前を $r に入れて下さい。
        // QUIZ
		$a = null;
        // /QUIZ

        $a = 'りんご';

        $this->assertSame($a, $r);
    }

    // 値をラベルに変える 3 - 連想配列を使う
    public function test_300_040_value_to_label_associate(): void
    {
        /*
            'apple' => 'りんご',
            'orange' => 'オレンジ',
            'grape' => 'ぶどう',
        */

        $v = 'apple';

        // 連想配列 を使って 'apple' に該当する名前を $r に入れて下さい。
        $fruits = [
            'apple' => 'りんご',
            'orange' => 'オレンジ',
            'grape' => 'ぶどう',
        ];

        // QUIZ
		$a = null;
        // /QUIZ

        $a = 'りんご';

        $this->assertSame($a, $r);
    }

    // 値をラベルに変える 4 - Enumを使う
    public function test_300_050_value_to_label_enum(): void
    {

        $v = 'apple';

        // Enum を使って 'apple' に該当する名前を $r に入れて下さい。
        // QUIZ
		$a = null;
        // /QUIZ

        $a = 'りんご';

        $this->assertSame($a, $r);
    }
}

Enum Fruit: string
{
    case Apple  = 'apple';
    case Orange = 'orange';
    case Grape  = 'Grape';

    // ラベルを返す
    public function label(): string
    {
        return match ($this) {
            Fruit::Apple   => 'りんご',
            Fruit::Orange  => 'オレンジ',
            Fruit::Grape   => 'ぶどう',
            default        => '不明',
        };
    }
}
