<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class Q115CommentTest extends TestCase
{
    // 
    public function test_115_010_comment(): void
    {
        $r = 12345;

        // VSCode で複数の行をまとめてコメントを外すには、
        // 複数行を選択した後、 Command 長押し → / を押します。
        // 
        // コメントのある行に再び実行すると、 コメントが外れます。

        // if (1) {
        //   $a = 1;
        // }

        $this->assertTrue(true);
    }

}
