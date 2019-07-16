<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $ageRange;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $weight = 0;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $height = 0;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Champs requis")
     */
    private $numberOfChildren;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $socialStatus;

    /**
     * @ORM\Column(type="array", length=255)
     * @Assert\NotBlank(message="Chams requis")
     */
    private $habits = [];

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $favoriteBreakfast;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $favoriteDrink;

    /**
     * @ORM\Column(type="array", length=255)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $familyClinicalHistory = [];

    /**
     * @ORM\Column(type="array", length=255)
     * @Assert\NotBlank(message="Champs requis")
     */
    private $userClinicalHistory = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword()
    {
        // not needed for apps that do not check user passwords
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed for apps that do not check user passwords
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAgeRange(): ?string
    {
        return $this->ageRange;
    }

    public function setAgeRange(string $ageRange): self
    {
        $this->ageRange = $ageRange;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getNumberOfChildren(): ?int
    {
        return $this->numberOfChildren;
    }

    public function setNumberOfChildren(int $numberOfChildren): self
    {
        $this->numberOfChildren = $numberOfChildren;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getSocialStatus(): ?string
    {
        return $this->socialStatus;
    }

    public function setSocialStatus(string $socialStatus): self
    {
        $this->socialStatus = $socialStatus;

        return $this;
    }

    public function getHabits(): ?array
    {
        $choices = [];
        foreach ($this->habits as $habit) {
            $choices[] = $habit;
        }
        return $choices;
    }

    public function setHabits(array $habits): self
    {
        $this->habits = $habits;

        return $this;
    }

    public function getFavoriteBreakfast(): ?string
    {
        return $this->favoriteBreakfast;
    }

    public function setFavoriteBreakfast(string $favoriteBreakfast): self
    {
        $this->favoriteBreakfast = $favoriteBreakfast;

        return $this;
    }

    public function getFavoriteDrink(): ?string
    {
        return $this->favoriteDrink;
    }

    public function setFavoriteDrink(string $favoriteDrink): self
    {
        $this->favoriteDrink = $favoriteDrink;

        return $this;
    }

    public function getFamilyClinicalHistory(): ?array
    {
        $choices = [];
        foreach ($this->familyClinicalHistory as $illness) {
                $choices[] = $illness;
        }
        return $choices;
    }

    public function setFamilyClinicalHistory(array $familyClinicalHistory): self
    {
        $this->familyClinicalHistory = $familyClinicalHistory;

        return $this;
    }

    public function getUserClinicalHistory(): ?array
    {
        $choices = [];
        foreach ($this->userClinicalHistory as $illness) {
            $choices[] = $illness;
        }
        return $choices;
    }

    public function setUserClinicalHistory(array $userClinicalHistory): self
    {
        $this->userClinicalHistory = $userClinicalHistory;

        return $this;
    }
}
