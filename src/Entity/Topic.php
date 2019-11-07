<?php

namespace App\Entity;

use App\Entity\Library\BaseEntity;
use App\Entity\Library\Traits\TimestampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TopicRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Topic extends BaseEntity
{
    use TimestampTrait;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Discipline", inversedBy="topics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $discipline;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Topic", inversedBy="topics")
     */
    private $parentTopic;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Topic", mappedBy="parentTopic", cascade={"remove"})
     */
    private $topics;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Lesson", mappedBy="topics")
     */
    private $lessons;

    public function __construct()
    {
        $this->topics = new ArrayCollection();
        $this->lessons = new ArrayCollection();
    }

    public function __toString(): ?string
    {
        return $this->getName();
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

    public function getParentTopic(): ?self
    {
        return $this->parentTopic;
    }

    public function setParentTopic(?self $parentTopic): self
    {
        $this->parentTopic = $parentTopic;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getTopics(): Collection
    {
        return $this->topics;
    }

    public function addTopic(self $topic): self
    {
        if (!$this->topics->contains($topic)) {
            $this->topics[] = $topic;
            $topic->setParentTopic($this);
        }

        return $this;
    }

    public function removeTopic(self $topic): self
    {
        if ($this->topics->contains($topic)) {
            $this->topics->removeElement($topic);
            // set the owning side to null (unless already changed)
            if ($topic->getParentTopic() === $this) {
                $topic->setParentTopic(null);
            }
        }

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
            $lesson->addTopic($this);
        }

        return $this;
    }

    public function removeLesson(Lesson $lesson): self
    {
        if ($this->lessons->contains($lesson)) {
            $this->lessons->removeElement($lesson);
            $lesson->removeTopic($this);
        }

        return $this;
    }
}
