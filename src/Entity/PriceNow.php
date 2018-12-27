<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;


/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PriceNowRepository")
 * @ApiFilter(RangeFilter::class, properties={"buy_average","PriceDifference"})
 */
class PriceNow
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
    private $buy_average;

    /**
     * @ORM\Column(type="integer")
     */
    private $buy_quantity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sell_average;

    /**
     * @ORM\Column(type="integer")
     */
    private $sell_quantity;

    /**
     * @ORM\Column(type="integer")
     */
    private $overall_average;

    /**
     * @ORM\Column(type="integer")
     */
    private $overall_quantity;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Item", mappedBy="price_new", cascade={"persist", "remove"})
     */
    private $item;

    /**
     * @ORM\Column(type="integer")
     */
    private $PriceDifference;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBuyAverage(): ?int
    {
        return $this->buy_average;
    }

    public function setBuyAverage(int $buy_average): self
    {
        $this->buy_average = $buy_average;

        return $this;
    }

    public function getBuyQuantity(): ?int
    {
        return $this->buy_quantity;
    }

    public function setBuyQuantity(int $buy_quantity): self
    {
        $this->buy_quantity = $buy_quantity;

        return $this;
    }

    public function getSellAverage(): ?string
    {
        return $this->sell_average;
    }

    public function setSellAverage(string $sell_average): self
    {
        $this->sell_average = $sell_average;

        return $this;
    }

    public function getSellQuantity(): ?int
    {
        return $this->sell_quantity;
    }

    public function setSellQuantity(int $sell_quantity): self
    {
        $this->sell_quantity = $sell_quantity;

        return $this;
    }

    public function getOverallAverage(): ?int
    {
        return $this->overall_average;
    }

    public function setOverallAverage(int $overall_average): self
    {
        $this->overall_average = $overall_average;

        return $this;
    }

    public function getOverallQuantity(): ?int
    {
        return $this->overall_quantity;
    }

    public function setOverallQuantity(int $overall_quantity): self
    {
        $this->overall_quantity = $overall_quantity;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(Item $item): self
    {
        $this->item = $item;

        // set the owning side of the relation if necessary
        if ($this !== $item->getPriceNew()) {
            $item->setPriceNew($this);
        }

        return $this;
    }

    public function getPriceDifference(): ?int
    {
        return $this->PriceDifference;
    }

    public function setPriceDifference(int $PriceDifference): self
    {
        $this->PriceDifference = $PriceDifference;

        return $this;
    }
}
