<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FavoriteDrinkRepository")
 */
class FavoriteDrink
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $takesCaffeinatedDrinks = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $takesAlcoholicDrinks = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $takesNothingSpecial = false;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="favoriteDrink")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTakesCaffeinatedDrinks(): ?bool
    {
        return $this->takesCaffeinatedDrinks;
    }

    public function setTakesCaffeinatedDrinks(?bool $takesCaffeinatedDrinks): self
    {
        $this->takesCaffeinatedDrinks = $takesCaffeinatedDrinks;

        return $this;
    }

    public function getTakesAlcoholicDrinks(): ?bool
    {
        return $this->takesAlcoholicDrinks;
    }

    public function setTakesAlcoholicDrinks(?bool $takesAlcoholicDrinks): self
    {
        $this->takesAlcoholicDrinks = $takesAlcoholicDrinks;

        return $this;
    }

    public function getTakesNothingSpecial(): ?bool
    {
        return $this->takesNothingSpecial;
    }

    public function setTakesNothingSpecial(?bool $takesNothingSpecial): self
    {
        $this->takesNothingSpecial = $takesNothingSpecial;

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
