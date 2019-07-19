<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ApiRepository")
 */
class Api
{
    /**
     * Rapid Api
     */
    const RAPID_API_HOST = 'priaid-symptom-checker-v1.p.rapidapi.com';

    /**
     * Infermedica Api
     */
    const URL_ALL_CONDITIONS = 'https://api.infermedica.com/v2/conditions';

    const CONTENT_TYPE = 'application/json';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $language;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year_of_birth;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getYearOfBirth(): ?int
    {
        return $this->year_of_birth;
    }

    public function setYearOfBirth(?int $year_of_birth): self
    {
        $this->year_of_birth = $year_of_birth;

        return $this;
    }
}
