<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     */
    private $ageRange;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SocialStatus", mappedBy="user", orphanRemoval=true)
     */
    private $socialStatus;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FavoriteBreakfast", mappedBy="user", orphanRemoval=true)
     */
    private $favoriteBreakfast;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FavoriteDrink", mappedBy="user", orphanRemoval=true)
     */
    private $favoriteDrink;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FamilyClinicalHistory", mappedBy="user", orphanRemoval=true)
     */
    private $familyClinicalHistory;

    /**
     * @ORM\Column(type="float")
     */
    private $weight = 0;

    /**
     * @ORM\Column(type="float")
     */
    private $height = 0;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfChildren;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    public function __construct()
    {
        $this->socialStatus = new ArrayCollection();
        $this->favoriteBreakfast = new ArrayCollection();
        $this->favoriteDrink = new ArrayCollection();
        $this->familyClinicalHistory = new ArrayCollection();
    }

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

    /**
     * @return Collection|SocialStatus[]
     */
    public function getSocialStatus(): Collection
    {
        return $this->socialStatus;
    }

    public function addSocialStatus(SocialStatus $socialStatus): self
    {
        if (!$this->socialStatus->contains($socialStatus)) {
            $this->socialStatus[] = $socialStatus;
            $socialStatus->setUser($this);
        }

        return $this;
    }

    public function removeSocialStatus(SocialStatus $socialStatus): self
    {
        if ($this->socialStatus->contains($socialStatus)) {
            $this->socialStatus->removeElement($socialStatus);
            // set the owning side to null (unless already changed)
            if ($socialStatus->getUser() === $this) {
                $socialStatus->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FavoriteBreakfast[]
     */
    public function getFavoriteBreakfast(): Collection
    {
        return $this->favoriteBreakfast;
    }

    public function addFavoriteBreakfast(FavoriteBreakfast $favoriteBreakfast): self
    {
        if (!$this->favoriteBreakfast->contains($favoriteBreakfast)) {
            $this->favoriteBreakfast[] = $favoriteBreakfast;
            $favoriteBreakfast->setUser($this);
        }

        return $this;
    }

    public function removeFavoriteBreakfast(FavoriteBreakfast $favoriteBreakfast): self
    {
        if ($this->favoriteBreakfast->contains($favoriteBreakfast)) {
            $this->favoriteBreakfast->removeElement($favoriteBreakfast);
            // set the owning side to null (unless already changed)
            if ($favoriteBreakfast->getUser() === $this) {
                $favoriteBreakfast->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FavoriteDrink[]
     */
    public function getFavoriteDrink(): Collection
    {
        return $this->favoriteDrink;
    }

    public function addFavoriteDrink(FavoriteDrink $favoriteDrink): self
    {
        if (!$this->favoriteDrink->contains($favoriteDrink)) {
            $this->favoriteDrink[] = $favoriteDrink;
            $favoriteDrink->setUser($this);
        }

        return $this;
    }

    public function removeFavoriteDrink(FavoriteDrink $favoriteDrink): self
    {
        if ($this->favoriteDrink->contains($favoriteDrink)) {
            $this->favoriteDrink->removeElement($favoriteDrink);
            // set the owning side to null (unless already changed)
            if ($favoriteDrink->getUser() === $this) {
                $favoriteDrink->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FamilyClinicalHistory[]
     */
    public function getFamilyClinicalHistory(): Collection
    {
        return $this->familyClinicalHistory;
    }

    public function addFamilyClinicalHistory(FamilyClinicalHistory $familyClinicalHistory): self
    {
        if (!$this->familyClinicalHistory->contains($familyClinicalHistory)) {
            $this->familyClinicalHistory[] = $familyClinicalHistory;
            $familyClinicalHistory->setUser($this);
        }

        return $this;
    }

    public function removeFamilyClinicalHistory(FamilyClinicalHistory $familyClinicalHistory): self
    {
        if ($this->familyClinicalHistory->contains($familyClinicalHistory)) {
            $this->familyClinicalHistory->removeElement($familyClinicalHistory);
            // set the owning side to null (unless already changed)
            if ($familyClinicalHistory->getUser() === $this) {
                $familyClinicalHistory->setUser(null);
            }
        }

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
}
