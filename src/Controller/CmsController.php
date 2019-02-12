<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CmsController extends AbstractController
{
    /**
     * @Route("/", name="cms")
     */
    public function index()
    {
        return $this->render('cms/index.html.twig', [
            'controller_name' => 'CmsController',
        ]);
    }
}
