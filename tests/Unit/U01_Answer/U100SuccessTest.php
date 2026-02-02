<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U100SuccessTest extends TestCase
{
    // Better PHPUnit というVSCodeのエクステンションを入れます。
    // Command キーを押したまま、 k を押して、続いて(Command キーを押したまま) f を押すと、
    // 下のウィンドウでテストが実行されることを確認して下さい。
    //
    // OK (1 test, 1 assertion)
    // 
    // と表示されればOKです。
    public function test_100_010_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public function test_100_020_that_false_is_false(): void
    {
        $this->assertFalse(false);
    }

    
}

