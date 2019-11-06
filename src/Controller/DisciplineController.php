<?php

namespace App\Controller;

use App\Entity\Discipline;
use App\Entity\User;
use App\Form\DisciplineType;
use App\Repository\DisciplineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/discipline")
 */
class DisciplineController extends AbstractController
{
    /**
     * @Route("/", name="ro_discipline_index", methods={"GET"})
     */
    public function index(DisciplineRepository $disciplineRepository): Response
    {
        return $this->render('discipline/index.html.twig', [
            'disciplines' => $disciplineRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ro_discipline_new", methods={"GET","POST"})
     */
    public function newStep1(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $discipline = new Discipline();
        $discipline->setUser($user);
        $form = $this->createForm(DisciplineType::class, $discipline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($discipline);
            $entityManager->flush();

            return $this->redirectToRoute('ro_discipline_show', ['id' => $discipline->getId()]);
        }

        return $this->render('discipline/new_step1.html.twig', [
            'discipline' => $discipline,
            'form' => $form->createView(),
        ]);
    }

//    /**
//     * @Route("/new/step2/{id}", name="ro_discipline_new_step2", methods={"GET","POST"})
//     */
//    public function newStep2(Request $request, Discipline $discipline): Response
//    {
//        return $this->render('discipline/new_step2.html.twig', [
//            'discipline' => $discipline,
//            'topics' => $discipline->getTopics()
//        ]);
//    }

    /**
     * @Route("/{id}", name="ro_discipline_show", methods={"GET"})
     */
    public function show(Discipline $discipline): Response
    {
        $topics = $discipline->getParentTopics();

        return $this->render('discipline/show.html.twig', [
            'discipline' => $discipline,
            'topics' => $topics
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ro_discipline_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Discipline $discipline): Response
    {
        $form = $this->createForm(DisciplineType::class, $discipline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ro_discipline_show', ['id' => $discipline->getId()]);
        }

        return $this->render('discipline/edit.html.twig', [
            'discipline' => $discipline,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ro_discipline_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Discipline $discipline): Response
    {
        if ($this->isCsrfTokenValid('delete'.$discipline->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($discipline);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ro_discipline_index');
    }
}
