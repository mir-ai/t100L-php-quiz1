<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U104StringTest extends TestCase
{
    public function test_u100120(): void
    {
        $r = 'abc';
        $this->assertSame('abc', $r);
    }

    public function test_u100121(): void
    {
        $r = "abc";
        $this->assertSame('abc', $r);
    }

    public function test_u100122(): void
    {
        $n = 1;
        $r = 'abc{$n}';
        $this->assertSame('abc{$n}', $r);
    }

    public function test_u100123(): void
    {
        $n = 1;
        $r = "abc{$n}";
        $this->assertSame('abc1', $r);
    }

    public function test_u100124(): void
    {
        $s = 'def';
        $r = "abc{$s}";
        $this->assertSame('abcdef', $r);
    }

    public function test_u100125(): void
    {
        $r = 'a' . 'b' . 'c';
        $this->assertSame('abc', $r);
    }

    public function test_u100126(): void
    {
        $r = 'a' . 'b' . 'c';
        $this->assertSame('abc', $r);
    }

    public function test_u100127(): void
    {
        $r = '\n';
        $this->assertSame('\n', $r);
    }

    public function test_u100128(): void
    {
        $r = "\n";
        $this->assertNotSame('\n', $r);
    }

    public function test_u100129(): void
    {
        $r1 = '"';
        $r2 = "\"";
        $this->assertSame($r1, $r2);
    }

    public function test_u100130(): void
    {
        $r1 = "'";
        $r2 = '\'';
        $this->assertSame($r1, $r2);
    }
}

