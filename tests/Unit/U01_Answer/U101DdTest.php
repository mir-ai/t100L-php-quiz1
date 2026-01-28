<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U101DdTest extends TestCase
{
    // 
    public function test_dd(): void
    {
        $r = 12345;

        // ↓実行すると、値が表示され、処理が止まります。テストの途中で値の中身を確認したい時に使います。
        #dd($r);

        // ↓ddで処理が止まるので、ここは実行されない。
        $this->assertTrue(true);
    }

}
