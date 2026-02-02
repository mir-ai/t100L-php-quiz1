<?php

namespace Tests\Unit\U10_Miraie;

use PHPUnit\Framework\TestCase;

class U116AssertTest extends TestCase
{
    // PHPのユニットテストの仕組みを使って、学習を進めていきます。
    // ユニットテストには assertTrue(), assertSame()などが登場します。

    // assertTrue()
    // カッコの中が true だと、OKになります。
    public function test_116_010_assert_true(): void
    {
        $this->assertTrue(true);
    }

    // assertFalse()
    // カッコの中が false だと、OKになります。
    public function test_116_020_assert_false(): void
    {
        $this->assertFalse(false);
    }

    // assertSame()
    // カッコの中の2つの引数が同じだと、OKになります。
    //
    // この学習では、１つ目に期待する値を $a (answer)で置くことが多いです。（一般的には answer ではなく expected ですが）
    // ２つめに実際の値を $r （result）で置くことが多いです。（一般的には result ではなく actual ですが）
    public function test_116_030_assert_same(): void
    {
        $expected = 'MIRAiE';
        $actual = 'MIRAiE';

        $this->assertSame($expected, $actual);
    }

    /**
     *
     * assertには以下のような種類がありますが、この学習ではあまり使っていません。
     * https://docs.phpunit.de/en/11.5/assertions.html
     *
     * assertNull($var)	$varがNULLである
     * assertEquals($val1, $val2)	$val1が$val2と等しい
     * assertNotEquals($val1, $val2)	$val1が$val2と等しくない
     * assertSame($val1, $val2)	$val1と$val2が型も含めて等しい
     * assertInternalType($type, $val)	$valの型名が$typeである
     *
     * assertCount($count, [1,2,3])
     *
     * assertStringStartsWith()
     * assertStringEndsWith()
     * assertStringContainsString()
     * assertStringContainsStringIgnoringCase()
     * assertRegExp()
     *
     * assertIsArray()
     * assertIsString()
     *
     * assertGreaterThan($expect, $var)	$expect < $var が成立する
     * assertGreaterThanOrEqual($expect, $var)	$expect <= $var が成立する
     * assertLessThan($expect, $var)	$expect > $var が成立する
     * assertLessThanOrEqual($expect, $var)	$expect >= $var が成立する
     *
     * assertJsonStringEqualsJsonString($str1, $str2)	$str1と$str2がjsonとして等しい
     * assertRegExp($ptn, $str)	$strが正規表現$ptnにマッチする
     *
     * assertTrue($var)	$varがTRUEである
     * assertFalse($var)	$varがFALSEである
     *
     * assertArrayHasKey($key, $array)	配列$arrayにキー$keyが存在する
     * assertContains($val, $array)	配列$arrayに値$valが存在する
     * assertContainsOnly($type, $array)	配列$arrayの値の型がすべて$typeである
     * assertCount($count, $array)	配列$arrayの値の数が$countである
     * assertEmpty($array)	配列$arrayが空である
     *
     * assertObjectHasAttribute($attr, $object)	オブジェクト$objectにプロパティ変数$attrが存在する
     * assertClassHasAttribute($attr, $class)	クラス名$classにプロパティ変数$attrが存在する
     * assertClassHasStaticAttribute($attr, $class)	クラス名$classに静的プロパティ変数$attrが存在する
     * assertInstanceOf($class, $instance)	$instanceがクラス名$classのインスタンスである
     *
     * assertFileExists($file)	$fileが存在する
     * assertFileEquals($file1, $file2)	$file1と$file2の内容が等しい
     * assertJsonFileEqualsJsonFile($file1, $file2)	$file1と$file2の内容がjsonとして等しい
     * assertJsonStringEqualsJsonFile($file1, $json)	$file1の内容と$jsonがjsonとして等しい
     */
}
