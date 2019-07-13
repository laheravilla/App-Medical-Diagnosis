<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SocialStatusRepository")
 */
class SocialStatus
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
    private $isMarried = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isDivorced = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isWidowOrWidower = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInConcubinage = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isSingle = false;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="socialStatus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsMarried(): ?bool
    {
        return $this->isMarried;
    }

    public function setIsMarried(?bool $isMarried): self
    {
        $this->isMarried = $isMarried;

        return $this;
    }

    public function getIsDivorced(): ?bool
    {
        return $this->isDivorced;
    }

    public function setIsDivorced(?bool $isDivorced): self
    {
        $this->isDivorced = $isDivorced;

        return $this;
    }

    public function getIsWidowOrWidower(): ?bool
    {
        return $this->isWidowOrWidower;
    }

    public function setIsWidowOrWidower(?bool $isWidowOrWidower): self
    {
        $this->isWidowOrWidower = $isWidowOrWidower;

        return $this;
    }

    public function getIsInConcubinage(): ?bool
    {
        return $this->isInConcubinage;
    }

    public function setIsInConcubinage(?bool $isInConcubinage): self
    {
        $this->isInConcubinage = $isInConcubinage;

        return $this;
    }

    public function getIsSingle(): ?bool
    {
        return $this->isSingle;
    }

    public function setIsSingle(?bool $isSingle): self
    {
        $this->isSingle = $isSingle;

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
