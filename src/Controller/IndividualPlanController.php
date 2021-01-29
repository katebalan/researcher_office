<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Individual\Plan;
use App\Entity\User;
use App\Form\IndividualPlanType;
use App\Repository\IndividualPlanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/individual/plan")
 */
class IndividualPlanController extends AbstractController
{
    /**
     * @Route("/", name="ro_individual_plan_index", methods={"GET"})
     */
    public function index(IndividualPlanRepository $individualPlanRepository): Response
    {
        $user = $this->getUser();

        return $this->render('individual_plan/index.html.twig', [
            'individual_plans' => $individualPlanRepository->findBy(['createdBy' => $user]),
        ]);
    }

    /**
     * @Route("/new", name="ro_individual_plan_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $individualPlan = new Plan();
        $individualPlan->setCreatedBy($user);

        $form = $this->createForm(IndividualPlanType::class, $individualPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($individualPlan);
            $entityManager->flush();

            return $this->redirectToRoute('ro_individual_plan_index');
        }

        return $this->render('individual_plan/new.html.twig', [
            'individual_plan' => $individualPlan,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ro_individual_plan_show", methods={"GET"})
     */
    public function show(Plan $individualPlan): Response
    {
        return $this->render('individual_plan/show.html.twig', [
            'plan' => $individualPlan,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ro_individual_plan_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Plan $individualPlan): Response
    {
        $em = $this->getDoctrine()->getManager();

        $originalWorks = new ArrayCollection();
        $originalDisciplines = new ArrayCollection();

        foreach ($individualPlan->getWorks() as $work) {
            $originalWorks->add($work);
        }
        foreach ($individualPlan->getIndividualPlansDisciplines() as $discipline) {
            $originalDisciplines->add($discipline);
        }

        $form = $this->createForm(IndividualPlanType::class, $individualPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            foreach ($originalWorks as $work) {
                if (false === $individualPlan->getWorks()->contains($work)) {
                    $em->remove($work);
                }
            }

            foreach ($originalDisciplines as $discipline) {
                if (false === $individualPlan->getIndividualPlansDisciplines()->contains($discipline)) {
                    $em->remove($discipline);
                }
            }

            $em->flush();

            return $this->redirectToRoute('ro_individual_plan_index');
        }

        return $this->render('individual_plan/edit.html.twig', [
            'individual_plan' => $individualPlan,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ro_individual_plan_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Plan $individualPlan): Response
    {
        if ($this->isCsrfTokenValid('delete' . $individualPlan->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($individualPlan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ro_individual_plan_index');
    }
}
