<?php

namespace App\Tests;

use App\Entity\Distributor;
use App\Entity\Order;
use App\Entity\Trader;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OrderTest extends TestCase
{
    protected $order;

    protected function setUp(): void
    {
        $this->order = new Order();
    }

    public function testCorrectDate()
    {
        $dist = new Distributor();
        $trad = new Trader();

        $this->order->setDistributor($dist);
        $this->order->setTrader($trad);


        $dis = $this->order->getDistributor();
        $tra = $this->order->getTrader();

        $this->assertEquals($dist, $dis);
        $this->assertEquals($trad, $tra);


    }

/*    public function catchException()
    {
        $this->catchException(TypeError::class);
        $this->$order->set
    }*/
}