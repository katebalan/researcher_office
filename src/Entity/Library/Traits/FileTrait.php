<?php


namespace App\Entity\Library\Traits;


use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

trait FileTrait
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $filename;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $realFilename;

    /**
     * @var File $file
     *
     * @Assert\File(mimeTypes={ "application/pdf"}, mimeTypesMessage="mime_type_message")
     */
    private $file;

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getRealFilename(): ?string
    {
        return $this->realFilename;
    }

    public function setRealFilename(?string $realFilename): self
    {
        $this->realFilename = $realFilename;

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file): self
    {
        $this->file = $file;

        return $this;
    }
}
