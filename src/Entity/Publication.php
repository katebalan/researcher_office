<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Library\BaseEntity;
use App\Entity\Library\Traits\BlamableTrait;
use App\Entity\Library\Traits\FileTrait;
use App\Entity\Library\Traits\TimestampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PublicationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Publication extends BaseEntity
{
    use BlamableTrait;
    use FileTrait;
    use TimestampTrait;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $coAuthorsSimple;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="publications")
     */
    private $coAuthors;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $place;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pages;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    public function __construct()
    {
        $this->coAuthors = new ArrayCollection();
    }

    public function getCoAuthorsSimple(): ?string
    {
        return $this->coAuthorsSimple;
    }

    public function setCoAuthorsSimple(?string $coAuthorsSimple): self
    {
        $this->coAuthorsSimple = $coAuthorsSimple;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getCoAuthors(): Collection
    {
        return $this->coAuthors;
    }

    public function addCoAuthor(User $coAuthor): self
    {
        if (!$this->coAuthors->contains($coAuthor)) {
            $this->coAuthors[] = $coAuthor;
        }

        return $this;
    }

    public function removeCoAuthor(User $coAuthor): self
    {
        if ($this->coAuthors->contains($coAuthor)) {
            $this->coAuthors->removeElement($coAuthor);
        }

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPages(): ?string
    {
        return $this->pages;
    }

    public function setPages(?string $pages): self
    {
        $this->pages = $pages;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }
}
