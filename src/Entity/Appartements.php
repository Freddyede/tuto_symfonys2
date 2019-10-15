<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AppartementsRepository")
 */
class Appartements
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
    private $surface;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $images;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Price", mappedBy="appartement", cascade={"persist", "remove"})
     */
    private $price;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="appartements", cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

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

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(string $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getPrice(): ?Price
    {
        return $this->price;
    }

    public function setPrice(?Price $price): self
    {
        $this->price = $price;

        // set (or unset) the owning side of the relation if necessary
        $newAppartement = $price === null ? null : $this;
        if ($newAppartement !== $price->getAppartement()) {
            $price->setAppartement($newAppartement);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
