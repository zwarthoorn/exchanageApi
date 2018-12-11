<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PriceRangeRepository")
 */
class PriceRange
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $buyPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $buyQuantity;

    /**
     * @ORM\Column(type="integer")
     */
    private $sellingPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $sellingQuantity;

    /**
     * @ORM\Column(type="integer")
     */
    private $overalPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $overalQuantity;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ts;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Item", inversedBy="priceRanges")
     */
    private $item;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBuyPrice(): ?int
    {
        return $this->buyPrice;
    }

    public function setBuyPrice(int $buyPrice): self
    {
        $this->buyPrice = $buyPrice;

        return $this;
    }

    public function getBuyQuantity(): ?int
    {
        return $this->buyQuantity;
    }

    public function setBuyQuantity(int $buyQuantity): self
    {
        $this->buyQuantity = $buyQuantity;

        return $this;
    }

    public function getSellingPrice(): ?int
    {
        return $this->sellingPrice;
    }

    public function setSellingPrice(int $sellingPrice): self
    {
        $this->sellingPrice = $sellingPrice;

        return $this;
    }

    public function getSellingQuantity(): ?int
    {
        return $this->sellingQuantity;
    }

    public function setSellingQuantity(int $sellingQuantity): self
    {
        $this->sellingQuantity = $sellingQuantity;

        return $this;
    }

    public function getOveralPrice(): ?int
    {
        return $this->overalPrice;
    }

    public function setOveralPrice(int $overalPrice): self
    {
        $this->overalPrice = $overalPrice;

        return $this;
    }

    public function getOveralQuantity(): ?int
    {
        return $this->overalQuantity;
    }

    public function setOveralQuantity(int $overalQuantity): self
    {
        $this->overalQuantity = $overalQuantity;

        return $this;
    }

    public function getTs(): ?\DateTimeInterface
    {
        return $this->ts;
    }

    public function setTs(\DateTimeInterface $ts): self
    {
        $this->ts = $ts;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }
}
