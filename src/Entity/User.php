<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Individual\Plan;
use App\Entity\Library\Traits\TimestampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User implements UserInterface
{
    use TimestampTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secondName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $patronymic;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $birthPlace;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $education;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $biography;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ScientificInterest", inversedBy="users")
     */
    private $interest;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Publication", mappedBy="coAuthors")
     */
    private $publications;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Diploma", mappedBy="user", orphanRemoval=true)
     */
    private $diplomas;

    /**
     * @var string
     */
    private $plainPassword;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ScientificRank", inversedBy="users")
     */
    private $scientificRank;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ScientificDegree", inversedBy="users")
     */
    private $scientificDegree;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Discipline", mappedBy="user", orphanRemoval=true)
     */
    private $disciplines;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Individual\Plan", mappedBy="createdBy")
     */
    private $individualPlans;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apiRozkladId;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ScientificIdentity", mappedBy="user", cascade={"persist"})
     */
    private $scientificIdentities;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Note", mappedBy="user")
     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Feedback", mappedBy="user")
     */
    private $feedback;

    public function __construct()
    {
        $this->interest = new ArrayCollection();
        $this->publications = new ArrayCollection();
        $this->diplomas = new ArrayCollection();
        $this->disciplines = new ArrayCollection();
        $this->individualPlans = new ArrayCollection();
        $this->scientificIdentities = new ArrayCollection();
        $this->notes = new ArrayCollection();
        $this->feedback = new ArrayCollection();
    }

    public function __toString()
    {
        $name = \mb_substr($this->getFirstName(), 0, 1);
        $patronymic = \mb_substr($this->getPatronymic(), 0, 1);

        $initials = $name ? $name . '. ' : '';
        $initials = $patronymic ? $initials . $patronymic . '.' : $initials;

        return $this->getSecondName() . ' ' . $initials;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return \array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt(): void
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
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

    public function getSecondName(): ?string
    {
        return $this->secondName;
    }

    public function setSecondName(string $secondName): self
    {
        $this->secondName = $secondName;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
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

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function setPatronymic(?string $patronymic): self
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    public function getBirthPlace(): ?string
    {
        return $this->birthPlace;
    }

    public function setBirthPlace(?string $birthPlace): self
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    public function getEducation(): ?string
    {
        return $this->education;
    }

    public function setEducation(?string $education): self
    {
        $this->education = $education;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(?string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * @return Collection|ScientificInterest[]
     */
    public function getInterest(): Collection
    {
        return $this->interest;
    }

    public function addInterest(ScientificInterest $interest): self
    {
        if (!$this->interest->contains($interest)) {
            $this->interest[] = $interest;
        }

        return $this;
    }

    public function removeInterest(ScientificInterest $interest): self
    {
        if ($this->interest->contains($interest)) {
            $this->interest->removeElement($interest);
        }

        return $this;
    }

    /**
     * @return Collection|Publication[]
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    public function addPublication(Publication $publication): self
    {
        if (!$this->publications->contains($publication)) {
            $this->publications[] = $publication;
            $publication->addCoAuthor($this);
        }

        return $this;
    }

    public function removePublication(Publication $publication): self
    {
        if ($this->publications->contains($publication)) {
            $this->publications->removeElement($publication);
            $publication->removeCoAuthor($this);
        }

        return $this;
    }

    /**
     * @return Collection|Diploma[]
     */
    public function getDiplomas(): Collection
    {
        return $this->diplomas;
    }

    public function addDiploma(Diploma $diploma): self
    {
        if (!$this->diplomas->contains($diploma)) {
            $this->diplomas[] = $diploma;
            $diploma->setUser($this);
        }

        return $this;
    }

    public function removeDiploma(Diploma $diploma): self
    {
        if ($this->diplomas->contains($diploma)) {
            $this->diplomas->removeElement($diploma);
            // set the owning side to null (unless already changed)
            if ($diploma->getUser() === $this) {
                $diploma->setUser(null);
            }
        }

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getScientificRank(): ?ScientificRank
    {
        return $this->scientificRank;
    }

    public function setScientificRank(?ScientificRank $scientificRank): self
    {
        $this->scientificRank = $scientificRank;

        return $this;
    }

    public function getScientificDegree(): ?ScientificDegree
    {
        return $this->scientificDegree;
    }

    public function setScientificDegree(?ScientificDegree $scientificDegree): self
    {
        $this->scientificDegree = $scientificDegree;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->getSecondName() . ' ' . $this->getFirstName() . ' ' . $this->getPatronymic();
    }

    /**
     * @return Collection|Discipline[]
     */
    public function getDisciplines(): Collection
    {
        return $this->disciplines;
    }

    public function addDiscipline(Discipline $discipline): self
    {
        if (!$this->disciplines->contains($discipline)) {
            $this->disciplines[] = $discipline;
            $discipline->setUser($this);
        }

        return $this;
    }

    public function removeDiscipline(Discipline $discipline): self
    {
        if ($this->disciplines->contains($discipline)) {
            $this->disciplines->removeElement($discipline);
            // set the owning side to null (unless already changed)
            if ($discipline->getUser() === $this) {
                $discipline->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Plan[]
     */
    public function getIndividualPlans(): Collection
    {
        return $this->individualPlans;
    }

    public function addIndividualPlan(Plan $individualPlan): self
    {
        if (!$this->individualPlans->contains($individualPlan)) {
            $this->individualPlans[] = $individualPlan;
            $individualPlan->setCreatedBy($this);
        }

        return $this;
    }

    public function removeIndividualPlan(Plan $individualPlan): self
    {
        if ($this->individualPlans->contains($individualPlan)) {
            $this->individualPlans->removeElement($individualPlan);
            // set the owning side to null (unless already changed)
            if ($individualPlan->getCreatedBy() === $this) {
                $individualPlan->setCreatedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApiRozkladId()
    {
        return $this->apiRozkladId;
    }

    /**
     * @param mixed $apiRozkladId
     */
    public function setApiRozkladId($apiRozkladId): void
    {
        $this->apiRozkladId = $apiRozkladId;
    }

    /**
     * @return Collection|ScientificIdentity[]
     */
    public function getScientificIdentities(): Collection
    {
        return $this->scientificIdentities;
    }

    public function addScientificIdentity(ScientificIdentity $scientificIdentity): self
    {
        if (!$this->scientificIdentities->contains($scientificIdentity)) {
            $this->scientificIdentities[] = $scientificIdentity;
            $scientificIdentity->setUser($this);
        }

        return $this;
    }

    public function removeScientificIdentity(ScientificIdentity $scientificIdentity): self
    {
        if ($this->scientificIdentities->contains($scientificIdentity)) {
            $this->scientificIdentities->removeElement($scientificIdentity);
            // set the owning side to null (unless already changed)
            if ($scientificIdentity->getUser() === $this) {
                $scientificIdentity->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setUser($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->contains($note)) {
            $this->notes->removeElement($note);
            // set the owning side to null (unless already changed)
            if ($note->getUser() === $this) {
                $note->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Feedback[]
     */
    public function getFeedback(): Collection
    {
        return $this->feedback;
    }

    public function addFeedback(Feedback $feedback): self
    {
        if (!$this->feedback->contains($feedback)) {
            $this->feedback[] = $feedback;
            $feedback->setUser($this);
        }

        return $this;
    }

    public function removeFeedback(Feedback $feedback): self
    {
        if ($this->feedback->contains($feedback)) {
            $this->feedback->removeElement($feedback);
            // set the owning side to null (unless already changed)
            if ($feedback->getUser() === $this) {
                $feedback->setUser(null);
            }
        }

        return $this;
    }
}
