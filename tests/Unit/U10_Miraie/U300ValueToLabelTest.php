<?php

namespace Tests\Unit\U10_Miraie;

use PHPUnit\Framework\TestCase;

class U300ValueToLabelTest extends TestCase
{
    //
    public function test_300_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // 値をラベル（名称）に変換するさまざまなやり方

    // 値をラベルに変える 1 - ifを使う
    public function test_300_020_value_to_label_if(): void
    {
        /*
            'apple' => 'りんご',
            'orange' => 'オレンジ',
            'grape' => 'ぶどう',
        */

        $v = 'apple';

        $actual = '不明';

        if ($v == 'apple') {
            $actual = 'りんご';
        } else if ($v == 'orange') {
            $actual = 'オレンジ';
        } else if ($v == 'grape') {
            $actual = 'ぶどう';
        }

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // 値をラベルに変える 2 - matchを使う
    public function test_300_030_value_to_label_match(): void
    {
        /*
            'apple' => 'りんご',
            'orange' => 'オレンジ',
            'grape' => 'ぶどう',
        */

        $v = 'orange';

        $actual = match($v) {
            'apple' => 'りんご',
            'orange' => 'オレンジ',
            'grape' => 'ぶどう',
            default => '不明',
        };

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // 値をラベルに変える 3 - 連想配列を使う
    public function test_300_040_value_to_label_associate(): void
    {
        /*
            'apple' => 'りんご',
            'orange' => 'オレンジ',
            'grape' => 'ぶどう',
        */

        $v = 'grape';

        // 連想配列 を使う
        $fruits = [
            'apple' => 'りんご',
            'orange' => 'オレンジ',
            'grape' => 'ぶどう',
        ];

        $actual = $fruits[$v] ?? '不明';

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }

    // 値をラベルに変える 4 - Enumを使う
    public function test_300_050_value_to_label_enum(): void
    {

        $v = 'pineapple';

        // 下記に定義されている Enum::Fruits を使って 'apple' に該当する名前を $r に入れて下さい。
        $e = Fruit::tryFrom($v);
        $actual = $e->label();

        // QUIZ
		$expected = null;
        // /QUIZ

        $this->assertSame($expected, $actual);
    }
}

Enum Fruit: string
{
    case Apple  = 'apple';
    case Orange = 'orange';
    case Grape  = 'grape';
    case Pineapple  = 'pineapple';

    // ラベルを返す
    public function label(): string
    {
        return match ($this) {
            Fruit::Apple   => 'りんご',
            Fruit::Orange  => 'オレンジ',
            Fruit::Grape   => 'ぶどう',
            Fruit::Pineapple  => 'パイナップル',
            default        => '不明',
        };
    }
}
