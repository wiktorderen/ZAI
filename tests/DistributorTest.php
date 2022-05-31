<?php


namespace App\Tests;
use App\Entity\Distributor;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class DistributorTest extends TestCase
{
    public function testCorrectData()
    {
        $distributor = new Distributor();
        $mail = "paczek0000@gmail.com";

        $distributor->setEmail($mail);

        $ma = $distributor->getEmail();

        $this->assertEquals($ma, $mail);
    }
}