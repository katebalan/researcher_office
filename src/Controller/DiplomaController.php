<?php

namespace App\Controller;

use App\Entity\Diploma;
use App\Entity\Publication;
use App\Entity\User;
use App\Form\DiplomaType;
use App\Repository\DiplomaRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/diploma")
 */
class DiplomaController extends AbstractController
{
//    /**
//     * @Route("/{id}", name="ro_diploma_index", methods={"GET"})
//     */
//    public function index(DiplomaRepository $diplomaRepository, User $user): Response
//    {
//        return $this->render('diploma/index.html.twig', [
//            'diplomas' => $diplomaRepository->findBy(['author' => $user]),
//        ]);
//    }

    /**
     * @Route("/{id}/new", name="ro_diploma_new", methods={"GET","POST"})
     */
    public function new(Request $request, User $user): Response
    {
        $diploma = new Diploma();
        $form = $this->createForm(DiplomaType::class, $diploma);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $diploma->setUser($user);
            $entityManager->persist($diploma);
            $entityManager->flush();

            return $this->redirectToRoute('ro_index');
        }

        return $this->render('diploma/new.html.twig', [
            'diploma' => $diploma,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ro_diploma_show", methods={"GET"})
     */
    public function show(Diploma $diploma, FileUploader $fileUploader): Response
    {
//        $fileUploader->load($diploma);

        return $this->render('diploma/show.html.twig', [
            'diploma' => $diploma,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ro_diploma_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Diploma $diploma): Response
    {
        $form = $this->createForm(DiplomaType::class, $diploma);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ro_index');
        }

        return $this->render('diploma/edit.html.twig', [
            'diploma' => $diploma,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ro_diploma_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Diploma $diploma): Response
    {
        if ($this->isCsrfTokenValid('delete'.$diploma->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($diploma);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ro_diploma_index');
    }

    /**
     * @Route("/{id}/download", name="ro_diploma_download", methods={"GET"})
     */
    public function download(Diploma $diploma, FileUploader $fileUploader)
    {
        $fileUploader->load($diploma);

        return $this->file($diploma->getFile(), $diploma->getRealFilename(), ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
