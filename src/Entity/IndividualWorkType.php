<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IndividualWorkTypeRepository")
 */
class IndividualWorkType
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
    private $canonical;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\IndividualWork", mappedBy="type")
     */
    private $individualWorks;

    public function __construct()
    {
        $this->individualWorks = new ArrayCollection();
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
        $this->setCanonical((str_replace(' ', '_', strtolower($name))));

        return $this;
    }

    public function getCanonical(): ?string
    {
        return $this->canonical;
    }

    public function setCanonical(string $canonical): self
    {
        $this->canonical = $canonical;

        return $this;
    }

    /**
     * @return Collection|IndividualWork[]
     */
    public function getIndividualWorks(): Collection
    {
        return $this->individualWorks;
    }

    public function addIndividualWork(IndividualWork $individualWork): self
    {
        if (!$this->individualWorks->contains($individualWork)) {
            $this->individualWorks[] = $individualWork;
            $individualWork->setType($this);
        }

        return $this;
    }

    public function removeIndividualWork(IndividualWork $individualWork): self
    {
        if ($this->individualWorks->contains($individualWork)) {
            $this->individualWorks->removeElement($individualWork);
            // set the owning side to null (unless already changed)
            if ($individualWork->getType() === $this) {
                $individualWork->setType(null);
            }
        }

        return $this;
    }
}
