<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Distributor::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $distributor;

    /**
     * @ORM\ManyToOne(targetEntity=Trader::class, inversedBy="orders")
     */
    private $trader;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDistributor(): ?Distributor
    {
        return $this->distributor;
    }

    public function setDistributor(?Distributor $distributor): self
    {
        $this->distributor = $distributor;

        return $this;
    }

    public function getTrader(): ?Trader
    {
        return $this->trader;
    }

    public function setTrader(?Trader $trader): self
    {
        $this->trader = $trader;

        return $this;
    }
}
