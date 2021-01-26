<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Entity\Diploma;
use App\Entity\Publication;
use App\Service\FileUploader;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class FileUploadListener.
 */
class FileUploadListener
{
    /**
     * @var FileUploader
     */
    private $uploader;

    private $file;

    /**
     * FileUploadListener constructor.
     */
    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * Listen create actions.
     */
    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    /**
     * Listen update actions.
     */
    public function preUpdate(PreUpdateEventArgs $args): void
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    /**
     * Listen Edit actions.
     */
    public function postLoad(LifecycleEventArgs $args): void
    {
        $entity = $args->getEntity();

        if (!\method_exists($entity, 'setFile') && !\method_exists($entity, 'getFilename')) {
            return;
        }

        $folder = $this->uploader->getFolder($entity);

        if ($fileName = $entity->getFilename()) {
            $entity->setFile(new File($this->uploader->getTargetDirectory() . $folder . '/' . $fileName));
            $this->file = $entity->getFile();
        }
    }

    /**
     * Upload new file and save new path into entity.
     *
     * @param $entity
     */
    private function uploadFile($entity): void
    {
        // upload only works for Publication and Diploma entities
        if (!($entity instanceof Publication || $entity instanceof Diploma)) {
            return;
        }

        $folder = $this->uploader->getFolder($entity);
        $file = $entity->getFile();

        // only upload new files
        if ($file instanceof UploadedFile) {
            $fileName = $this->uploader->upload($file, $folder);
            $entity->setFilename($fileName);
            $entity->setRealFilename($file->getClientOriginalName());
        } elseif ($file instanceof File) {
            // prevents the full file path being saved on updates
            // as the path is set on the postLoad listener
            $entity->setFilename($file->getFilename());
            $entity->setRealFilename($file->getBasename());
        }
    }
}
