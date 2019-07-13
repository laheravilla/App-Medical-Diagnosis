<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FavoriteBreakfastRepository")
 */
class FavoriteBreakfast
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
    private $takesTypicalFrenchBreakfast = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $takesGreenJuices = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $takesPorridgeOrMuesli = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $takesFruitsMix = false;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="favoriteBreakfast")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTakesTypicalFrenchBreakfast(): ?bool
    {
        return $this->takesTypicalFrenchBreakfast;
    }

    public function setTakesTypicalFrenchBreakfast(?bool $takesTypicalFrenchBreakfast): self
    {
        $this->takesTypicalFrenchBreakfast = $takesTypicalFrenchBreakfast;

        return $this;
    }

    public function getTakesGreenJuices(): ?bool
    {
        return $this->takesGreenJuices;
    }

    public function setTakesGreenJuices(?bool $takesGreenJuices): self
    {
        $this->takesGreenJuices = $takesGreenJuices;

        return $this;
    }

    public function getTakesPorridgeOrMuesli(): ?bool
    {
        return $this->takesPorridgeOrMuesli;
    }

    public function setTakesPorridgeOrMuesli(?bool $takesPorridgeOrMuesli): self
    {
        $this->takesPorridgeOrMuesli = $takesPorridgeOrMuesli;

        return $this;
    }

    public function getTakesFruitsMix(): ?bool
    {
        return $this->takesFruitsMix;
    }

    public function setTakesFruitsMix(?bool $takesFruitsMix): self
    {
        $this->takesFruitsMix = $takesFruitsMix;

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
