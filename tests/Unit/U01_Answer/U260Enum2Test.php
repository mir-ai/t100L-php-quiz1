<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

// 列挙型 / Enum
// https://www.php.net/manual/ja/language.types.enumerations.php
Enum Weather2: int
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
            Weather2::Hare    => '晴れ',
            Weather2::Kumori  => '曇り',
            Weather2::Ame     => '雨',
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

class U260Enum2Test extends TestCase
{
    public function test_260_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }
    
    // Enumの配列を取得
    public function test_260_020_enum1(): void
    {
        $actual = Weather2::cases();
        $expected = [
            Weather2::Hare,
            Weather2::Kumori,
            Weather2::Ame,
        ];
        $this->assertSame($expected, $actual);

    }

    // 値の配列を取得
    public function test_260_030_enum2(): void
    {
        $actual = Weather2::values();
        $expected = [1, 2, 3];

        $this->assertSame($expected, $actual);
    }

    // 値のラベルを取得
    public function test_260_040_enum3(): void
    {
        $this->assertSame('晴れ', Weather2::Hare->label());
    }

    // 値とレベルの連想配列を取得
    public function test_260_050_enum4(): void
    {
        $actual = Weather2::options();
        $expected = [
            1 => '晴れ',
            2 => '曇り',
            3 => '雨',
        ];
        $this->assertSame($expected, $actual);
    }
    
}
