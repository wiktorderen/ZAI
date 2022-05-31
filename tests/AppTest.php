<?php


namespace App\Tests;


use App\Entity\Distributor;
use App\Entity\Order;
use App\Entity\Product;
use App\Entity\SuperAdmin;
use App\Entity\Trader;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AppTest extends WebTestCase
{
    public function testData()
    {
        $client = static::createClient();
        $crawlerHome = $client->request('GET', '/');
        $this->assertResponseIsSuccessful("OK");
        $this->assertResponseStatusCodeSame(200);
        $this->assertPageTitleSame('ZAI');

        $crawlerLogin = $client->request('GET', '/login');
        $this->assertResponseIsSuccessful("OK");
        $this->assertResponseStatusCodeSame(200);
        $this->assertPageTitleSame('Log in');

        $crawlerRegister = $client->request('GET', '/register');
        $this->assertResponseIsSuccessful("OK");
        $this->assertResponseStatusCodeSame(200);
        $this->assertPageTitleSame('Welcome!');


        $trader = new Trader();
        $distributor = new Distributor();
        $product = new Product();
        $order = new Order();
        $superAdmin = new SuperAdmin();

        $mail = "paczek0000@gmail.com";
        $name = 'Alex Black';
        $first_name = 'Alex';
        $last_name = 'Black';
        $productName = 'Intel Core i7';
        $description = 'Brand new Intel processor';
        $flag= true;


        $distributor->setEmail($mail);
        $distributor->setName($name);
        $distributor->setPassword($mail);
        $ma = $distributor->getEmail();
        $na = $distributor->getName();
        $this->assertEquals($ma, $mail);
        $this->assertEquals($na, $name);

        $trader->setEmail($mail);
        $trader->setLastName($last_name);
        $trader->setFirstName($first_name);
        $trEmail = $trader->getEmail();
        $trLast = $trader->getLastName();
        $trFirst = $trader->getFirstName();
        $this->assertEquals($mail,$trEmail);
        $this->assertEquals($trLast,$last_name);
        $this->assertEquals($trFirst,$first_name);

        $product->setName($productName);
        $product->setDescription($description);
        $prName = $product->getName();
        $prDescription = $product->getDescription();
        $this->assertEquals($prName, $productName);
        $this->assertEquals($prDescription, $description);

        $order->setTrader($trader);
        $order->setDistributor($distributor);
        $orTrader = $order->getTrader();
        $orDistributor = $order->getDistributor();
        $this->assertEquals($orTrader, $trader);
        $this->assertEquals($orDistributor, $distributor);

        $superAdmin->setEmail($mail);
        $superAdmin->setName($first_name);
        $superAdmin->setLastName($last_name);
        $saEmail = $superAdmin->getEmail();
        $saName = $superAdmin->getName();
        $saLastname = $superAdmin->getLastName();
        $this->assertEquals($saEmail, $mail);
        $this->assertEquals($saName, $first_name);
        $this->assertEquals($saLastname, $last_name);

        $this->assertTrue($flag);

    }
}