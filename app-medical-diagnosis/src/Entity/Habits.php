<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HabitsRepository")
 */
class Habits
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
    private $smokes = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $drinks = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sleepsALot = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $doesSport = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $takesMedicaments = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isExposedToChemicals = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSmokes(): ?bool
    {
        return $this->smokes;
    }

    public function setSmokes(?bool $smokes): self
    {
        $this->smokes = $smokes;

        return $this;
    }

    public function getDrinks(): ?bool
    {
        return $this->drinks;
    }

    public function setDrinks(?bool $drinks): self
    {
        $this->drinks = $drinks;

        return $this;
    }

    public function getSleepsALot(): ?bool
    {
        return $this->sleepsALot;
    }

    public function setSleepsALot(?bool $sleepsALot): self
    {
        $this->sleepsALot = $sleepsALot;

        return $this;
    }

    public function getDoesSport(): ?bool
    {
        return $this->doesSport;
    }

    public function setDoesSport(?bool $doesSport): self
    {
        $this->doesSport = $doesSport;

        return $this;
    }

    public function getTakesMedicaments(): ?bool
    {
        return $this->takesMedicaments;
    }

    public function setTakesMedicaments(?bool $takesMedicaments): self
    {
        $this->takesMedicaments = $takesMedicaments;

        return $this;
    }

    public function getIsExposedToChemicals(): ?bool
    {
        return $this->isExposedToChemicals;
    }

    public function setIsExposedToChemicals(?bool $isExposedToChemicals): self
    {
        $this->isExposedToChemicals = $isExposedToChemicals;

        return $this;
    }
}
