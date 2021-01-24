<?php

declare(strict_types=1);

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="ro_index", methods={"GET"})
     * @Template()
     */
    public function index()
    {
        return [
            'user' => $this->getUser(),
        ];
    }
}
