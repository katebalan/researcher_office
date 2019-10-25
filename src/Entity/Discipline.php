<?php

namespace App\Entity;

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

    public function __construct()
    {
        $this->topics = new ArrayCollection();
        $this->duration = 0;
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
}
