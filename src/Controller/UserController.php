<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ChangePasswordType;
use App\Form\ResetPasswordType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/user")
 * @IsGranted("ROLE_USER")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="ro_user_index", methods={"GET"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        $user = $this->getUser();

        return $this->render('user/index.html.twig', [
            'users' => array_diff($users, [$user]),
        ]);
    }

    /**
     * @Route("/new", name="ro_user_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('ro_user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ro_user_show", methods={"GET"})
     * @Security("(is_granted('ROLE_ADMIN') and user !== entity) or user == entity")
     */
    public function show(User $entity): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $entity,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ro_user_edit", methods={"GET","POST"})
     * @Security("is_granted('ROLE_ADMIN') or user == entity")
     */
    public function edit(Request $request, User $entity): Response
    {
        $form = $this->createForm(UserType::class, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute(
                $entity === $this->getUser()
                    ? 'ro_index'
                    : 'ro_user_index'
            );
        }

        return $this->render('user/edit.html.twig', [
            'user' => $entity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ro_user_delete", methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ro_user_index');
    }

    /**
     * @Route("/change/password", name="ro_user_change_password", methods={"GET", "POST"})
     */
    public function changePassword(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        /** @var User $entity */
        $entity = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ChangePasswordType::class, $entity);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $oldPassword = $form['oldPassword']->getData();

            if ($passwordEncoder->isPasswordValid($entity, $oldPassword)) {
                $newEncodedPassword = $passwordEncoder->encodePassword($entity, $entity->getPlainPassword());
                $entity->setPassword($newEncodedPassword);

                $em->persist($entity);
                $em->flush();

                return $this->redirectToRoute(
                    $entity === $this->getUser()
                        ? 'ro_index'
                        : 'ro_user_index'
                );
            } else {
                $form->addError(new FormError('Старий пароль неправильний'));
            }
        }

        return $this->render('user/change_password.html.twig', array(
            'form' => $form->createView(),
            'label' => 'change_password'
        ));
    }

    /**
     * @Route("/{id}/reset/password", name="ro_user_reset_password", methods={"GET", "POST"})
     * @Security("user !== entity and is_granted('ROLE_ADMIN')")
     */
    public function resetPassword(Request $request, User $entity, UserPasswordEncoderInterface $passwordEncoder)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ResetPasswordType::class, $entity);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newEncodedPassword = $passwordEncoder->encodePassword($entity, $entity->getPlainPassword());
            $entity->setPassword($newEncodedPassword);

            $em->persist($entity);
            $em->flush();

            return $this->redirectToRoute('ro_user_index');
        }

        return $this->render('user/change_password.html.twig', array(
            'form' => $form->createView(),
            'label' => 'reset_password'
        ));
    }
}
