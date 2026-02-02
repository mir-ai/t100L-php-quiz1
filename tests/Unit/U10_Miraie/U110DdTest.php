<?php

namespace Tests\Unit\U10_Miraie;

use PHPUnit\Framework\TestCase;

class U110DdTest extends TestCase
{
    // dd()
    // https://readouble.com/laravel/12.x/ja/helpers.html#method-dd
    public function test_110_010_dd(): void
    {
        // ddの行のコメント // を削除して、実行してみて下さい。
        // ↓実行すると、値が表示され、処理が中断します。テストの途中で値の中身を確認したい時に使います。

        $v = 12345;
        // dd($v);

        // ↓ddで処理が止まるので、ここは実行されない。
        $this->assertTrue(true);
    }

}
