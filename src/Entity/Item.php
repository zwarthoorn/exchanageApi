<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ItemRepository")
 */
class Item
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $store;

    /**
     * @ORM\Column(type="boolean")
     */
    private $member;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\PriceNow", inversedBy="item", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $price_new;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PriceRange", mappedBy="item")
     */
    private $priceRanges;

    public function __construct()
    {
        $this->priceRanges = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
      $this->id = $id;

      return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStore(): ?int
    {
        return $this->store;
    }

    public function setStore(int $store): self
    {
        $this->store = $store;

        return $this;
    }

    public function getMember(): ?bool
    {
        return $this->member;
    }

    public function setMember(bool $member): self
    {
        $this->member = $member;

        return $this;
    }

    public function getPriceNew(): ?PriceNow
    {
        return $this->price_new;
    }

    public function setPriceNew(PriceNow $price_new): self
    {
        $this->price_new = $price_new;

        return $this;
    }

    /**
     * @return Collection|PriceRange[]
     */
    public function getPriceRanges(): Collection
    {
        return $this->priceRanges;
    }

    public function addPriceRange(PriceRange $priceRange): self
    {
        if (!$this->priceRanges->contains($priceRange)) {
            $this->priceRanges[] = $priceRange;
            $priceRange->setItem($this);
        }

        return $this;
    }

    public function removePriceRange(PriceRange $priceRange): self
    {
        if ($this->priceRanges->contains($priceRange)) {
            $this->priceRanges->removeElement($priceRange);
            // set the owning side to null (unless already changed)
            if ($priceRange->getItem() === $this) {
                $priceRange->setItem(null);
            }
        }

        return $this;
    }
}
