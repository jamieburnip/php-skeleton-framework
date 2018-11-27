<?php

namespace App\Framework;

use PHPUnit\Framework\TestCase;

class TestTest extends TestCase
{
    public function test_stuff_returns(): void
    {
        $stuff = new Test;

        $this->assertEquals('Stuff', $stuff->returnStuff());
    }

    public function test_other_stuff_returns(): void
    {
        $stuff = new Test;

        $this->assertEquals('Other stuff', $stuff->returnOtherStuff());
    }

    public function test_stuff_returns_from_one(): void
    {
        $stuff = new Test;

        $this->assertEquals('Stuff', $stuff->returnOne());
    }

    public function test_other_stuff_returns_from_Two(): void
    {
        $stuff = new Test;

        $this->assertEquals('Other stuff', $stuff->returnTwo());
    }

    public function test_stuff_returns_from_Three(): void
    {
        $stuff = new Test;

        $this->assertEquals('Stuff', $stuff->returnThree());
    }

    public function test_other_stuff_returns_from_four(): void
    {
        $stuff = new Test;

        $this->assertEquals('Other stuff', $stuff->returnFour());
    }
}
