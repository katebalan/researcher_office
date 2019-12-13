<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScientificIdentityTypeRepository")
 */
class ScientificIdentityType
{
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
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ScientificIdentity", mappedBy="type")
     */
    private $scientificIdentities;

    public function __construct()
    {
        $this->scientificIdentities = new ArrayCollection();
    }

    public function __toString(): ?string
    {
        return $this->getName();
    }

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
        $this->setCode(str_replace(' ', '_', strtolower($name)));

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
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
            $scientificIdentity->setType($this);
        }

        return $this;
    }

    public function removeScientificIdentity(ScientificIdentity $scientificIdentity): self
    {
        if ($this->scientificIdentities->contains($scientificIdentity)) {
            $this->scientificIdentities->removeElement($scientificIdentity);
            // set the owning side to null (unless already changed)
            if ($scientificIdentity->getType() === $this) {
                $scientificIdentity->setType(null);
            }
        }

        return $this;
    }
}
