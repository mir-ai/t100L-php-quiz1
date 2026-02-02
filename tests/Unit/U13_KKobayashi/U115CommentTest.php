<?php

namespace Tests\Unit\U13_KKobayashi;

use PHPUnit\Framework\TestCase;

class U115CommentTest extends TestCase
{
    // コメント
    // https://www.php.net/manual/ja/language.basic-syntax.comments.php
    public function test_115_010_comment(): void
    {
        $expected = 1;
        $actual = 1;

        // VSCode で複数の行をまとめてコメントを外すには、
        // 複数行を選択した後、 Command 長押し → / を押します。
        //
        // コメントのある行に再び実行すると、 コメントが外れます。

        // if (1) {
        //   $actual = 1;
        // }

        $this->assertSame($expected, $actual);
    }

}
