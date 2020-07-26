<?php

namespace App\Entity\Individual;

use App\Entity\Library\Traits\TimestampTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IndividualWorkRepository")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="individual_work")
 */
class Work
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
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $hours;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ternOfExecution;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mark;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Individual\WorkType", inversedBy="individualWorks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Individual\Plan", inversedBy="works")
     */
    private $individualPlan;

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

        return $this;
    }

    public function getHours(): ?float
    {
        return $this->hours;
    }

    public function setHours(float $hours): self
    {
        $this->hours = $hours;

        return $this;
    }

    public function getTernOfExecution(): ?string
    {
        return $this->ternOfExecution;
    }

    public function setTernOfExecution(string $ternOfExecution): self
    {
        $this->ternOfExecution = $ternOfExecution;

        return $this;
    }

    public function getMark(): ?string
    {
        return $this->mark;
    }

    public function setMark(string $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getType(): ?WorkType
    {
        return $this->type;
    }

    public function setType(?WorkType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getIndividualPlan(): ?Plan
    {
        return $this->individualPlan;
    }

    public function setIndividualPlan(?Plan $individualPlan): self
    {
        $this->individualPlan = $individualPlan;

        return $this;
    }
}
