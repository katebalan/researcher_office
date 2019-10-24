<?php

namespace App\Entity;

use App\Entity\Library\BaseEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScientificDegreeRepository")
 */
class ScientificDegree extends BaseEntity
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shortName;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="scientificDegree")
     */
    private $users;

    public function __construct($name, $shortName)
    {
        $this->users = new ArrayCollection();
        $this->setName($name);
        $this->setShortName($shortName);
    }

    public function __toString(): ?string
    {
        return $this->getName();
    }

    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    public function setShortName(string $shortName): self
    {
        $this->shortName = $shortName;

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
            $user->setScientificDegree($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getScientificDegree() === $this) {
                $user->setScientificDegree(null);
            }
        }

        return $this;
    }
}
