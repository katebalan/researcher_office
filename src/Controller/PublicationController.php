<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Publication;
use App\Entity\User;
use App\Form\PublicationType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/publication")
 */
class PublicationController extends AbstractController
{
    /**
     * @Route("/new", name="ro_publication_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $publication = new Publication();
        /** @var User $user */
        $user = $this->getUser();

        $publication->addCoAuthor($user);
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($publication);
            $entityManager->flush();

            return $this->redirectToRoute('ro_index');
        }

        return $this->render('publication/new.html.twig', [
            'publication' => $publication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ro_publication_show", methods={"GET"})
     */
    public function show(Publication $publication, FileUploader $fileUploader): Response
    {
//        $fileUploader->load($publication);

        return $this->render('publication/show.html.twig', [
            'publication' => $publication,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ro_publication_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Publication $publication): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ro_index');
        }

        return $this->render('publication/edit.html.twig', [
            'publication' => $publication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ro_publication_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Publication $publication): Response
    {
        if ($this->isCsrfTokenValid('delete' . $publication->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($publication);
            $entityManager->flush();
        }

        // TODO return something else for users which are not log in
        return $this->redirectToRoute('ro_index');
    }

    /**
     * @Route("/{id}/download", name="ro_publication_download", methods={"GET"})
     */
    public function download(Publication $publication, FileUploader $fileUploader)
    {
        $fileUploader->load($publication);

        return $this->file($publication->getFile(), $publication->getRealFilename(), ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
