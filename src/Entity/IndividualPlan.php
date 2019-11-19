<?php

namespace App\Entity;

use App\Entity\Library\Traits\TimestampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IndividualPlanRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class IndividualPlan
{
    use TimestampTrait;

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
     * @ORM\ManyToMany(targetEntity="App\Entity\Discipline", inversedBy="individualPlans")
     * @ORM\JoinTable(name="individual_plan_discipline2")
     */
    private $disciplines2;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\IndividualWork", mappedBy="individualPlan", cascade={"persist"})
     */
    private $works;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="individualPlans")
     */
    private $createdBy;

    public function __construct()
    {
        $this->disciplines = new ArrayCollection();
        $this->disciplines2 = new ArrayCollection();
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
     * @return Collection|Discipline[]
     */
    public function getDisciplines2(): Collection
    {
        return $this->disciplines2;
    }

    public function addDiscipline2(Discipline $discipline2): self
    {
        if (!$this->disciplines2->contains($discipline2)) {
            $this->disciplines2[] = $discipline2;
        }

        return $this;
    }

    public function removeDiscipline2(Discipline $discipline2): self
    {
        if ($this->disciplines2->contains($discipline2)) {
            $this->disciplines2->removeElement($discipline2);
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

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }
}
