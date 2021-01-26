<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Feedback;
use App\Entity\User;
use App\Form\FeedbackType;
use App\Repository\FeedbackRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/feedback")
 */
class FeedbackController extends AbstractController
{
    /**
     * @Route("/", name="ro_feedback_index", methods={"GET"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(FeedbackRepository $feedbackRepository): Response
    {
        return $this->render('feedback/index.html.twig', [
            'feedbacks' => $feedbackRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ro_feedback_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $feedback = new Feedback();

        /** @var User|null $user */
        $user = $this->getUser();
        if ($user instanceof User) {
            $feedback->setUser($user);
            $feedback->setEmail($user->getEmail());
        }

        $form = $this->createForm(FeedbackType::class, $feedback);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($feedback);
            $entityManager->flush();

            return $this->redirectToRoute('ro_index');
        }

        return $this->render('feedback/new.html.twig', [
            'feedback' => $feedback,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ro_feedback_delete", methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Feedback $feedback): Response
    {
        if ($this->isCsrfTokenValid('delete' . $feedback->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($feedback);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ro_feedback_index');
    }
}
