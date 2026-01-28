<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U105ArrayTest extends TestCase
{
    public function test_u100133(): void
    {
        $r = [];
        $this->assertSame([], $r);
    }

    public function test_u100134(): void
    {
        $r = [1, 2, 3];
        $this->assertSame([1, 2, 3], $r);
    }

    public function test_u100135(): void
    {
        $r = [1, 2];
        $r[] = 3;
        $this->assertSame([1, 2, 3], $r);
    }

    public function test_u100136(): void
    {
        $r = [];
        $r[] = 1;
        $r[] = 2;
        $r[] = 3;
        $this->assertSame([1, 2, 3], $r);
    }

    public function test_u100137(): void
    {
        $r = ['a', 'b', 'c'];
        $this->assertSame(['a', 'b', 'c'], $r);
    }

    public function test_u100138(): void
    {
        $r = ['a', 'b'];
        $r[] = 'c';
        $this->assertSame(['a', 'b', 'c'], $r);
    }

    public function test_u100139(): void
    {
        $r = [];
        $r[] = 'a';
        $r[] = 'b';
        $r[] = 'c';
        $this->assertSame(['a', 'b', 'c'], $r);
    }
}

