<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Diploma;
use App\Entity\Publication;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class FileUploader
 * @package App\Service
 */
class FileUploader
{
    /**
     * @var $targetDirectory
     */
    private $targetDirectory;

    /**
     * FileUploader constructor.
     * @param $targetDirectory
     */
    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    /**
     * @param UploadedFile|File $file
     * @param String $folder
     * @return string
     */
    public function upload(UploadedFile $file, string $folder)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        try {
            $file->move($this->getTargetDirectory() . $folder . '/', $fileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        return $fileName;
    }

    public function load(&$entity)
    {
        if (!method_exists($entity, 'setFile') and !method_exists($entity, 'getFilename')) {
            return false;
        }

        $folder = $this->getFolder($entity);
        if ($fileName = $entity->getFilename()) {
            $entity->setFile(new File($this->getTargetDirectory() . $folder . '/' . $fileName));
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

    public function getFolder($object)
    {
        $folder = '';

        if ($object instanceof Publication) {
            $folder = "publication";
        }

        if ($object instanceof Diploma) {
            $folder = "diploma";
        }

        return $folder;
    }
}
