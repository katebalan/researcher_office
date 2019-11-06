<?php

namespace App\Controller;

use App\Entity\Discipline;
use App\Entity\Topic;
use App\Form\TopicType;
use App\Repository\TopicRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TopicController extends AbstractController
{
    /**
     * @Route("/discipline/{id}/topic/new", name="ro_topic_new", methods={"GET","POST"})
     */
    public function new(Request $request, Discipline $discipline): Response
    {
        $topic = new Topic();
        $discipline->addTopic($topic);
        $form = $this->createForm(TopicType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($discipline);
            $entityManager->persist($topic);
            $entityManager->flush();
            $entityManager->clear();

            return $this->redirectToRoute('ro_discipline_show', ['id' => $discipline->getId()]);
        }

        return $this->render('topic/new.html.twig', [
            'topic' => $topic,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/topic/{id}/new", name="ro_subtopic_new", methods={"GET","POST"})
     */
    public function newSubtopic(Request $request, Topic $topicParent): Response
    {
        $topic = new Topic();
        $discipline = $topicParent->getDiscipline();
        $discipline->addTopic($topic);
        $topic->setParentTopic($topicParent);
        $form = $this->createForm(TopicType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($discipline);
            $entityManager->persist($topic);
            $entityManager->flush();
            $entityManager->clear();

            return $this->redirectToRoute('ro_discipline_show', ['id' => $discipline->getId()]);
        }

        return $this->render('topic/new.html.twig', [
            'topic' => $topic,
            'form' => $form->createView(),
        ]);
    }

//    /**
//     * @Route("/{id}", name="topic_show", methods={"GET"})
//     */
//    public function show(Topic $topic): Response
//    {
//        return $this->render('topic/show.html.twig', [
//            'topic' => $topic,
//        ]);
//    }

    /**
     * @Route("/topic/{id}/edit", name="ro_topic_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Topic $topic): Response
    {
        $form = $this->createForm(TopicType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ro_discipline_show', ['id' => $topic->getDiscipline()->getId()]);
        }

        return $this->render('topic/edit.html.twig', [
            'topic' => $topic,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/topic/{id}", name="ro_topic_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Topic $topic): Response
    {
        $discipline = $topic->getDiscipline();

        if ($this->isCsrfTokenValid('delete'.$topic->getId(), $request->request->get('_token'))) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($topic);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ro_discipline_show', ['id' => $discipline->getId()]);
    }
}
