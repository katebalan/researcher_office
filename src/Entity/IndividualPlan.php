<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IndividualPlanRepository")
 */
class IndividualPlan
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
    private $years;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Discipline", inversedBy="individualPlans")
     */
    private $disciplines;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\IndividualWork", mappedBy="individualPlan")
     */
    private $works;

    public function __construct()
    {
        $this->disciplines = new ArrayCollection();
        $this->works = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYears(): ?string
    {
        return $this->years;
    }

    public function setYears(string $years): self
    {
        $this->years = $years;

        return $this;
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
        }

        return $this;
    }

    public function removeDiscipline(Discipline $discipline): self
    {
        if ($this->disciplines->contains($discipline)) {
            $this->disciplines->removeElement($discipline);
        }

        return $this;
    }

    /**
     * @return Collection|IndividualWork[]
     */
    public function getWorks(): Collection
    {
        return $this->works;
    }

    public function addWork(IndividualWork $work): self
    {
        if (!$this->works->contains($work)) {
            $this->works[] = $work;
            $work->setIndividualPlan($this);
        }

        return $this;
    }

    public function removeWork(IndividualWork $work): self
    {
        if ($this->works->contains($work)) {
            $this->works->removeElement($work);
            // set the owning side to null (unless already changed)
            if ($work->getIndividualPlan() === $this) {
                $work->setIndividualPlan(null);
            }
        }

        return $this;
    }
}
