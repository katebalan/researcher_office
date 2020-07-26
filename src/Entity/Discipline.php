<?php

namespace App\Entity;

use App\Entity\Individual\PlanDisciplines;
use App\Entity\Library\BaseEntity;
use App\Entity\Library\Traits\TimestampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DisciplineRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Discipline extends BaseEntity
{
    use TimestampTrait;

    /**
     * @ORM\Column(type="float")
     */
    private $duration;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="disciplines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Topic", mappedBy="discipline", orphanRemoval=true)
     */
    private $topics;

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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Individual\PlanDisciplines", mappedBy="disciplines")
     */
    private $individualPlansDisciplines;

    /**
     * @ORM\Column(type="text")
     */
    private $overview;

    /**
     * @ORM\Column(type="text")
     */
    private $goal;

    /**
     * @ORM\Column(type="text")
     */
    private $task;

    public function __construct()
    {
        $this->topics = new ArrayCollection();
        $this->duration = 0;
        $this->individualPlansDisciplines = new ArrayCollection();
    }

    public function __toString(): ?string
    {
        return $this->getName();
    }

    public function getDuration(): ?float
    {
        return $this->duration;
    }

    public function setDuration(float $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Topic[]
     */
    public function getTopics(): Collection
    {
        return $this->topics;
    }

    public function addTopic(Topic $topic): self
    {
        if (!$this->topics->contains($topic)) {
            $this->topics[] = $topic;
            $topic->setDiscipline($this);
        }

        return $this;
    }

    public function removeTopic(Topic $topic): self
    {
        if ($this->topics->contains($topic)) {
            $this->topics->removeElement($topic);
            // set the owning side to null (unless already changed)
            if ($topic->getDiscipline() === $this) {
                $topic->setDiscipline(null);
            }
        }

        return $this;
    }

    public function getParentTopics(): Collection
    {
        $parents = new ArrayCollection();

        /** @var Topic $topic */
        foreach ($this->topics as $topic) {
            if (!$topic->getParentTopic())
                $parents[] = $topic;
        }

        return $parents;
    }

    public function getLessons(): array
    {
        $lessons = [];

        /** @var Topic $topic */
        foreach ($this->topics as $topic) {
            $lessons = array_merge($lessons, $topic->getLessons()->toArray());
        }

        return array_unique($lessons);
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

            $individualPlansDisciplines->setDiscipline($this);
        }

        return $this;
    }

    public function removeIndividualPlansDiscipline(PlanDisciplines $individualPlansDisciplines): self
    {
        if ($this->individualPlansDisciplines->contains($individualPlansDisciplines)) {
            $this->individualPlansDisciplines->removeElement($individualPlansDisciplines);

            // set the owning side to null (unless already changed)
            if ($individualPlansDisciplines->getDiscipline() === $this) {
                $individualPlansDisciplines->setDiscipline(null);
            }
        }

        return $this;
    }

    public function getOverview(): ?string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): self
    {
        $this->overview = $overview;

        return $this;
    }

    public function getGoal(): ?string
    {
        return $this->goal;
    }

    public function setGoal(string $goal): self
    {
        $this->goal = $goal;

        return $this;
    }

    public function getTask(): ?string
    {
        return $this->task;
    }

    public function setTask(string $task): self
    {
        $this->task = $task;

        return $this;
    }
}
