<?php

namespace App\Entity;

use App\Entity\Library\BaseEntity;
use App\Entity\Library\Traits\TimestampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScientificInterestRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ScientificInterest extends BaseEntity
{
    use TimestampTrait;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameCanonical;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="interest")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getNameCanonical(): ?string
    {
        return $this->nameCanonical;
    }

    public function setNameCanonical(?string $nameCanonical): self
    {
        $this->nameCanonical = $nameCanonical;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addInterest($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeInterest($this);
        }

        return $this;
    }
}
