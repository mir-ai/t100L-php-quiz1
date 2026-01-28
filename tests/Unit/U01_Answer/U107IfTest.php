<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U107IfTest extends TestCase
{
    public function test_u100160(): void
    {
        $r = [];
        $r[] = 'a';
        $r[] = 'b';
        $r[] = 'c';

        $this->assertSame(['a', 'b', 'c'], $r);
    }

    public function test_u100161(): void
    {
        $r = [];
        $r[] = 'a';

        if (1 == 1) {
            $r[] = 'b';
        }

        $this->assertSame(['a', 'b'], $r);
    }

    public function test_u100162(): void
    {
        $r = [];
        $r[] = 'a';

        if (1 != 1) {
            $r[] = 'b';
        }

        $this->assertSame(['a'], $r);
    }

    public function test_u100163(): void
    {
        $r = [];
        $r[] = 'a';

        if (1 == 1) {
            $r[] = 'b';
        } else {
            $r[] = 'c';
        }

        $this->assertSame(['a', 'b'], $r);
    }

    public function test_u100164(): void
    {
        $r = [];
        $r[] = 'a';

        if (1 != 1) {
            $r[] = 'b';
        } else {
            $r[] = 'c';
        }

        $this->assertSame(['a', 'c'], $r);
    }

    public function test_u100165(): void
    {
        $r = [];
        $r[] = 'a';

        if (2 == 1) {
            $r[] = 'b';
        } else if (2 == 2) {
            $r[] = 'c';
        } else {
            $r[] = 'd';
        }

        $this->assertSame(['a', 'c'], $r);
    }

    public function test_u100166(): void
    {
        $r = [];
        $r[] = 'a';

        $r[] = match(1) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        $this->assertSame(['a', 'b'], $r);
    }

    public function test_u100167(): void
    {
        $r = [];
        $r[] = 'a';

        $r[] = match(3) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        $this->assertSame(['a', 'd'], $r);
    }

    public function test_u100168(): void
    {
        $r = [];
        $r[] = 'a';

        $r[] = match(5) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        $this->assertSame(['a', 'e'], $r);
    }

    public function test_u100169(): void
    {
        $i  = 2;

        $r = [];
        $r[] = 'a';

        $r[] = match($i) {
            1 => 'b',
            2 => 'c',
            3 => 'd',
            default => 'e',
        };

        $this->assertSame(['a', 'c'], $r);
    }
}

