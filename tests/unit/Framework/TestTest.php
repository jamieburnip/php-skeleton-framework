<?php

namespace App\Framework;

use PHPUnit\Framework\TestCase;

class TestTest extends TestCase
{
    public function test_stuf_returns()
    {
        $stuff = new Test;

        $this->assertEquals('Stuff', $stuff->returnStuff());
    }
}
