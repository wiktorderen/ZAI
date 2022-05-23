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

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="orders")
     */
    private $product;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $time;

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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(?\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }
}
