<?php
declare(strict_types=1);

namespace App\EventListener;

use App\Entity\Diploma;
use App\Entity\Publication;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use App\Service\FileUploader;

/**
 * Class FileUploadListener
 * @package App\EventListener
 */
class FileUploadListener
{
    /**
     * @var FileUploader $uploader
     */
    private $uploader;

    private $file;

    /**
     * FileUploadListener constructor.
     *
     * @param FileUploader $uploader
     */
    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * Listen create actions
     *
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    /**
     * Listen update actions
     *
     * @param PreUpdateEventArgs $args
     */
    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    /**
     * Upload new file and save new path into entity
     *
     * @param $entity
     */
    private function uploadFile($entity)
    {
        // upload only works for Publication and Diploma entities
        if (!($entity instanceof Publication or $entity instanceof Diploma)) {
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

    /**
     * Listen Edit actions
     *
     * @param LifecycleEventArgs $args
     */
    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!method_exists($entity, 'setFile') and !method_exists($entity, 'getFilename')) {
            return;
        }

        $folder = $this->uploader->getFolder($entity);

        if ($fileName = $entity->getFilename()) {
            $entity->setFile(new File($this->uploader->getTargetDirectory() . $folder . '/' . $fileName));
            $this->file = $entity->getFile();
        }
    }
}
