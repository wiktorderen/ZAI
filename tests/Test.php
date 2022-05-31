<?php


namespace App\Tests;


use App\Entity\Distributor;
use App\Entity\Order;
use App\Entity\SuperAdmin;
use App\Entity\Trader;
use App\Repository\SuperAdminRepository;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
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
}