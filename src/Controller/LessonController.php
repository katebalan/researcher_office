<?php

namespace App\Controller;

use App\Entity\Discipline;
use App\Entity\Lesson;
use App\Form\LessonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lesson")
 */
class LessonController extends AbstractController
{
    /**
     * @Route("/{id}/new", name="ro_lesson_new", methods={"GET","POST"})
     */
    public function new(Request $request, Discipline $discipline): Response
    {
        $lesson = new Lesson();
        $form = $this->createForm(LessonType::class, $lesson, [
            'discipline_id' => $discipline->getId(),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($defaultHours = $lesson->getType()->getDefaultHours())
                $lesson->setHours($defaultHours);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lesson);
            $entityManager->flush();

            return $this->redirectToRoute('ro_discipline_show', ['id' => $discipline->getId()]);
        }

        return $this->render('lesson/new.html.twig', [
            'lesson' => $lesson,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ro_lesson_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lesson $lesson): Response
    {
        $discipline = $lesson->getDiscipline();
        $form = $this->createForm(LessonType::class, $lesson, [
            'discipline_id' => $discipline->getId(),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($defaultHours = $lesson->getType()->getDefaultHours())
                $lesson->setHours($defaultHours);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ro_discipline_show', ['id' => $discipline->getId()]);
        }

        return $this->render('lesson/edit.html.twig', [
            'lesson' => $lesson,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ro_lesson_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lesson $lesson): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lesson->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lesson);
            $entityManager->flush();
        }

        return $this->redirectToRoute('');
    }
}
