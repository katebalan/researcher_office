<?php

namespace App\Entity;

use App\Entity\Library\BaseEntity;
use App\Entity\Library\Traits\TimestampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessonRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Lesson extends BaseEntity
{
    use TimestampTrait;

    /**
     * @ORM\Column(type="float")
     */
    private $hours;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $evaluationType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LessonType", inversedBy="lessons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Topic", mappedBy="lessons")
     */
    private $topics;

    public function __construct()
    {
        $this->topics = new ArrayCollection();
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

    public function getEvaluationType(): ?string
    {
        return $this->evaluationType;
    }

    public function setEvaluationType(?string $evaluationType): self
    {
        $this->evaluationType = $evaluationType;

        return $this;
    }

    public function getType(): ?LessonType
    {
        return $this->type;
    }

    public function setType(?LessonType $type): self
    {
        $this->type = $type;

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
            $topic->addLesson($this);
        }

        return $this;
    }

    public function removeTopic(Topic $topic): self
    {
        if ($this->topics->contains($topic)) {
            $this->topics->removeElement($topic);
            $topic->removeLesson($this);
        }

        return $this;
    }
}
