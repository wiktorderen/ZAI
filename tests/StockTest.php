<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;


class StockTest extends TestCase
{
    public function testIsWorking()
    {
       $string = 'testing';
       $string2 = 'testing';
       $string3 = 'Testing';

       $this->assertSame($string, $string2);
       $this->assertSame($string2, $string);
    }

    public function testNumber()
    {
        $this->assertEquals(10, 5+5);
    }
}