<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PriceRepository")
 */
class Price
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
    private $labelPrix;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Produit", inversedBy="price", cascade={"persist", "remove"})
     */
    private $products;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Appartements", inversedBy="price", cascade={"persist", "remove"})
     */
    private $appartement;

    /**
     * @ORM\Column(type="text")
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabelPrix(): ?int
    {
        return $this->labelPrix;
    }

    public function setLabelPrix(int $price): self
    {
        $this->labelPrix = $price;

        return $this;
    }

    public function getProducts(): ?Produit
    {
        return $this->products;
    }

    public function setProducts(?Produit $products): self
    {
        $this->products = $products;

        return $this;
    }

    public function getAppartement(): ?Appartements
    {
        return $this->appartement;
    }

    public function setAppartement(?Appartements $appartement): self
    {
        $this->appartement = $appartement;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
