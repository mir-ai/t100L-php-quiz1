<?php

namespace Tests\Unit\U01_Answer;

use PHPUnit\Framework\TestCase;

class U108ForTest extends TestCase
{
    public function test_u100170(): void
    {
        $r = 1;
        $r++;

        $this->assertSame(2, $r);
    }

    public function test_u100171(): void
    {
        $r = 2;
        $r++;
        $r++;

        $this->assertSame(4, $r);
    }

    public function test_u100172(): void
    {
        $r = [];

        for ($i = 0; $i < 3; $i++) {
            $r[] = $i;
        }

        $this->assertSame([0, 1, 2], $r);
    }

    public function test_u100173(): void
    {
        $r = [];

        for ($i = 0; $i <= 3; $i++) {
            $r[] = $i;
        }

        $this->assertSame([0, 1, 2, 3], $r);
    }

    public function test_u100174(): void
    {
        $r = 1;
        $r += 2;

        $this->assertSame(3, $r);
    }


    public function test_u100175(): void
    {
        $r = 1;
        $r += 2;
        $r += 2;

        $this->assertSame(5, $r);
    }

    public function test_u100176(): void
    {
        $r = [];

        for ($i = 0; $i < 6; $i += 2) {
            $r[] = $i;
        }

        $this->assertSame([0, 2, 4], $r);
    }

    public function test_u100177(): void
    {
        $r = [];

        for ($i = 0; $i <= 6; $i += 2) {
            $r[] = $i;
        }

        $this->assertSame([0, 2, 4, 6], $r);
    }

    public function test_u100180(): void
    {
        $r = [];
        $i = 0;

        while ($i < 3) {
            $r[] = $i;
            $i++;
        }

        $this->assertSame([0, 1, 2], $r);
    }

    public function test_u100181(): void
    {
        $r = [];
        $i = 0;

        while ($i < 6) {
            $r[] = $i;
            $i += 2;
        }

        $this->assertSame([0, 2, 4], $r);
    }

    public function test_u100182(): void
    {
        $r = [];
        $i = 0;

        while ($i <= 6) {
            $r[] = $i;
            $i += 2;
        }

        $this->assertSame([0, 2, 4, 6], $r);
    }

    public function test_u100183(): void
    {
        $r = [];
        $i = 1;

        while ($i <= 10) {
            $r[] = $i;
            $i += $i;
        }

        $this->assertSame([1, 2, 4, 8], $r);
    }

    public function test_u100209(): void
    {
        $r = [];

        for ($i = 0; $i <= 5; $i++) {
            if ($i == 3) {
                continue;
            }
            $r[] = $i;
        }

        $this->assertSame([0, 1, 2, 4, 5], $r);
    }

    public function test_u100210(): void
    {
        $r = [];

        for ($i = 0; $i <= 5; $i++) {
            if ($i <  3) {
                continue;
            }
            $r[] = $i;
        }

        $this->assertSame([3, 4, 5], $r);
    }

    public function test_u100211(): void
    {
        $r = [];

        for ($i = 0; $i <= 5; $i++) {
            if ($i == 4) {
                break;
            }
            $r[] = $i;
        }

        $this->assertSame([0, 1, 2, 3], $r);
    }

    public function test_u100212(): void
    {
        $r = [];

        for ($i = 0; $i <= 5; $i++) {
            if ($i > 3) {
                break;
            }
            $r[] = $i;
        }

        $this->assertSame([0, 1, 2, 3], $r);
    }
}

