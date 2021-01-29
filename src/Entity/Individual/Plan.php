<?php

declare(strict_types=1);

namespace App\Entity\Individual;

use App\Entity\Library\Traits\BlamableTrait;
use App\Entity\Library\Traits\TimestampTrait;
use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IndividualPlanRepository")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="individual_plan")
 */
class Plan
{
    use TimestampTrait;
    use BlamableTrait;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Individual\PlanDisciplines", mappedBy="individualPlan", cascade={"persist", "remove"})
     */
    private $individualPlansDisciplines;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Individual\Work", mappedBy="individualPlan", cascade={"persist", "remove"})
     */
    private $works;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="individualPlans")
     */
    private $createdBy;

    public function __construct()
    {
        $this->individualPlansDisciplines = new ArrayCollection();
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
     * @return Collection|PlanDisciplines[]
     */
    public function getIndividualPlansDisciplines(): Collection
    {
        return $this->individualPlansDisciplines;
    }

    public function addIndividualPlansDiscipline(PlanDisciplines $individualPlansDisciplines): self
    {
        if (!$this->individualPlansDisciplines->contains($individualPlansDisciplines)) {
            $this->individualPlansDisciplines[] = $individualPlansDisciplines;

            $individualPlansDisciplines->setIndividualPlan($this);
        }

        return $this;
    }

    public function removeIndividualPlansDiscipline(PlanDisciplines $individualPlansDisciplines): self
    {
        if ($this->individualPlansDisciplines->contains($individualPlansDisciplines)) {
            $this->individualPlansDisciplines->removeElement($individualPlansDisciplines);

            // set the owning side to null (unless already changed)
            if ($individualPlansDisciplines->getIndividualPlan() === $this) {
                $individualPlansDisciplines->setIndividualPlan(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Work[]
     */
    public function getWorks(): Collection
    {
        return $this->works;
    }

    public function addWork(Work $work): self
    {
        if (!$this->works->contains($work)) {
            $this->works[] = $work;
            $work->setIndividualPlan($this);
        }

        return $this;
    }

    public function removeWork(Work $work): self
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
