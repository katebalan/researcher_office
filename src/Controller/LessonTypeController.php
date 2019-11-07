<?php

namespace App\Controller;

use App\Entity\LessonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LessonTypeController extends AbstractController
{
    /**
     * @Route("/lesson/type", name="ro_ajax_list_lesson_type", methods={"GET"})
     */
    public function listAjax()
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository(LessonType::class)->findAllArray();

        return $this->json($data);
    }
}
