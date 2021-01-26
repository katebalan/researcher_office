<?php

declare(strict_types=1);

namespace App\Entity\Library\Traits;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait BlameableTrait.
 */
trait BlamableTrait
{
    /**
     * Updated by.
     *
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    protected $updatedBy;

    /**
     * Created by.
     *
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $createdBy;

    /**
     * Get created by.
     *
     * @return User
     */
    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    /**
     * Set created by.
     *
     * @param User $createdBy
     */
    public function setCreatedBy($createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    /**
     * Get created by.
     *
     * @return User
     */
    public function getUpdatedBy(): ?User
    {
        return $this->updatedBy;
    }

    /**
     * Set created by.
     */
    public function setUpdatedBy(User $updatedBy): void
    {
        $this->updatedBy = $updatedBy;
    }

//    /**
//     * @ORM\PrePersist
//     * @ORM\PreUpdate
//     */
//    public function updatedTimestamps(): void
//    {
//        $this->setUpdatedBy();
//        if ($this->getCreatedBy() === null) {
//            $this->setCreatedBy();
//        }
//    }
}
