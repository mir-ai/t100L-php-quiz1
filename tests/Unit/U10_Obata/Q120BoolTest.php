<?php

namespace Tests\Unit\U10_Obata;

use PHPUnit\Framework\TestCase;

class Q120BoolTest extends TestCase
{
    public function test_120_010(): void
    {
        $r = true;
        $r = ! $r;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_120_020(): void
    {
        $r = false;
        $r = ! $r;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_120_030(): void
    {
        $r = true && true;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_120_040(): void
    {
        $r = true && false;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_120_050(): void
    {
        $r = true || true;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_120_060(): void
    {
        $r = true || false;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_120_070(): void
    {
        $r = false || true;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }

    public function test_120_080(): void
    {
        $r = false || false;

        // QUIZ
		$a = null;
        // /QUIZ

        $this->assertSame($a, $r);
    }
}

