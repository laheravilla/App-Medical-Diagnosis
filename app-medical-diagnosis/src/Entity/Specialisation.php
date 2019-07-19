<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecialisationRepository")
 */
class Specialisation
{
    const URL_ALL_SPECIALISATIONS = 'https://priaid-symptom-checker-v1.p.rapidapi.com/specialisations?language=fr-fr';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
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
    private $specialisationId;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSpecialisationId(): ?int
    {
        return $this->specialisationId;
    }

    public function setSpecialisationId(int $specialisationId): self
    {
        $this->specialisationId = $specialisationId;

        return $this;
    }
}
