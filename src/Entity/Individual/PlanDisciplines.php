<?php

declare(strict_types=1);

namespace App\Entity\Individual;

use App\Entity\Discipline;
use App\Entity\Library\Traits\TimestampTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="individual_plan_disciplines")
 */
class PlanDisciplines
{
    use TimestampTrait;

    public const SEMESTER = [1, 2];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Individual\Plan", inversedBy="individualPlansDisciplines")
     */
    private $individualPlan;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Discipline", inversedBy="individualPlansDisciplines")
     */
    private $discipline;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Choice(choices=PlanDisciplines::SEMESTER, message="Choose a valid semecter.")
     */
    private $semester;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $department;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $course;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $group_codes;

    public function getIndividualPlan(): ?Plan
    {
        return $this->individualPlan;
    }

    public function setIndividualPlan(?Plan $individualPlan): self
    {
        $this->individualPlan = $individualPlan;

        return $this;
    }

    public function getDiscipline(): ?Discipline
    {
        return $this->discipline;
    }

    public function setDiscipline(?Discipline $discipline): self
    {
        $this->discipline = $discipline;

        return $this;
    }

    public function getSemester(): ?int
    {
        return $this->semester;
    }

    public function setSemester(int $semester): self
    {
        $this->semester = $semester;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(string $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getCourse(): ?string
    {
        return $this->course;
    }

    public function setCourse(string $course): self
    {
        $this->course = $course;

        return $this;
    }

    public function getGroupCodes(): ?string
    {
        return $this->group_codes;
    }

    public function setGroupCodes(string $group_codes): self
    {
        $this->group_codes = $group_codes;

        return $this;
    }
}
