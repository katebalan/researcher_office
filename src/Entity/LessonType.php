<?php

namespace App\Entity;

use App\Entity\Library\BaseEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessonTypeRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class LessonType extends BaseEntity
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameCanonical;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $namePlural;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isControl;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isEvaluated;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $defaultHours;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lesson", mappedBy="type", orphanRemoval=true)
     */
    private $lessons;

    public function __construct()
    {
        $this->lessons = new ArrayCollection();
    }

    public function __toString(): ?string
    {
        return $this->getName();
    }

    public function getNameCanonical(): ?string
    {
        return $this->nameCanonical;
    }

    public function setNameCanonical(string $nameCanonical): self
    {
        $this->nameCanonical = $nameCanonical;

        return $this;
    }

    public function getNamePlural(): ?string
    {
        return $this->namePlural;
    }

    public function setNamePlural(string $namePlural): self
    {
        $this->namePlural = $namePlural;

        return $this;
    }

    public function getIsControl(): ?bool
    {
        return $this->isControl;
    }

    public function setIsControl(bool $isControl): self
    {
        $this->isControl = $isControl;

        return $this;
    }

    public function getIsEvaluated(): ?bool
    {
        return $this->isEvaluated;
    }

    public function setIsEvaluated(bool $isEvaluated): self
    {
        $this->isEvaluated = $isEvaluated;

        return $this;
    }

    public function getDefaultHours(): ?float
    {
        return $this->defaultHours;
    }

    public function setDefaultHours(?float $defaultHours): self
    {
        $this->defaultHours = $defaultHours;

        return $this;
    }

    /**
     * @return Collection|Lesson[]
     */
    public function getLessons(): Collection
    {
        return $this->lessons;
    }

    public function addLesson(Lesson $lesson): self
    {
        if (!$this->lessons->contains($lesson)) {
            $this->lessons[] = $lesson;
            $lesson->setType($this);
        }

        return $this;
    }

    public function removeLesson(Lesson $lesson): self
    {
        if ($this->lessons->contains($lesson)) {
            $this->lessons->removeElement($lesson);
            // set the owning side to null (unless already changed)
            if ($lesson->getType() === $this) {
                $lesson->setType(null);
            }
        }

        return $this;
    }
}
