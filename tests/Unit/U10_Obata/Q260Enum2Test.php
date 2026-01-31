<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;

// 列挙型 / Enum
// https://www.php.net/manual/ja/language.types.enumerations.php
Enum Weather: int
{
    case Hare   = 1;
    case Kumori = 2;
    case Ame    = 3;

    // 値の一覧を返す
    public static function values(): array
    {
        return array_column(Self::cases(), 'value');
    }

    // ラベルを返す
    public function label(): string
    {
        return match ($this) {
            Weather::Hare    => '晴れ',
            Weather::Kumori  => '曇り',
            Weather::Ame     => '雨',
            default          => '★不明★',
        };
    }

    /**
     * すべてのEnumケースのvalueとlabelを連想配列で取得する
     * @return array<string, string>
     */
    public static function options(): array
    {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = $case->label();
        }
        return $options;
    }

}

class Q260Enum2Test extends TestCase
{
    public function test_260_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // Enumの配列を取得
    public function test_260_020_enum1(): void
    {
        $r = Weather::cases();
        $a = [
            Weather::Hare,
            Weather::Kumori,
            Weather::Ame,
        ];
        $this->assertSame($a, $r);

    }

    // 値の配列を取得
    public function test_260_030_enum2(): void
    {
        $r = Weather::values();
        $expected = [1, 2, 3];

        $this->assertSame($expected, $r);
    }

    // 値のラベルを取得
    public function test_260_040_enum3(): void
    {
        $this->assertSame('晴れ', Weather::Hare->label());
    }

    // 値とレベルの連想配列を取得
    public function test_260_050_enum4(): void
    {
        $r = Weather::options();
        $a = [
            1 => '晴れ',
            2 => '曇り',
            3 => '雨',
        ];
        $this->assertSame($a, $r);
    }

}
