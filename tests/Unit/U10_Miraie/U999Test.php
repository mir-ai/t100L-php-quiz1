<?php

namespace Tests\Unit\U10_Miraie;

use PHPUnit\Framework\TestCase;

class U999Test extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    /**
     *
     *  assertNull($var)	$varがNULLである
     *  assertEquals($val1, $val2)	$val1が$val2と等しい
     *  assertSame($val1, $val2)	$val1と$val2が型も含めて等しい
     *  assertInternalType($type, $val)	$valの型名が$typeである
     *
     *  assertGreaterThan($expect, $var)	$expect < $var が成立する
     *  assertGreaterThanOrEqual($expect, $var)	$expect <= $var が成立する
     *  assertLessThan($expect, $var)	$expect > $var が成立する
     *  assertLessThanOrEqual($expect, $var)	$expect >= $var が成立する
     *
     *  assertJsonStringEqualsJsonString($str1, $str2)	$str1と$str2がjsonとして等しい
     *  assertRegExp($ptn, $str)	$strが正規表現$ptnにマッチする
     *
     *  assertTrue($var)	$varがTRUEである
     *  assertFalse($var)	$varがFALSEである
     *
     *  assertArrayHasKey($key, $array)	配列$arrayにキー$keyが存在する
     *  assertContains($val, $array)	配列$arrayに値$valが存在する
     *  assertContainsOnly($type, $array)	配列$arrayの値の型がすべて$typeである
     *  assertCount($count, $array)	配列$arrayの値の数が$countである
     *  assertEmpty($array)	配列$arrayが空である
     *
     *  assertObjectHasAttribute($attr, $object)	オブジェクト$objectにプロパティ変数$attrが存在する
     *  assertClassHasAttribute($attr, $class)	クラス名$classにプロパティ変数$attrが存在する
     *  assertClassHasStaticAttribute($attr, $class)	クラス名$classに静的プロパティ変数$attrが存在する
     *  assertInstanceOf($class, $instance)	$instanceがクラス名$classのインスタンスである
     *
     *  assertFileExists($file)	$fileが存在する
     *  assertFileEquals($file1, $file2)	$file1と$file2の内容が等しい
     *  assertJsonFileEqualsJsonFile($file1, $file2)	$file1と$file2の内容がjsonとして等しい
     *  assertJsonStringEqualsJsonFile($file1, $json)	$file1の内容と$jsonがjsonとして等しい
     */
}


