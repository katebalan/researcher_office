<?php


namespace App\Controller;


use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/analitics")
 */
class AnalyticsController extends AbstractController
{
    /**
     * @Route("/", name="ro_analitics_index")
     * @Template()
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();

        return [
            'users' => $users
        ];
    }
}
