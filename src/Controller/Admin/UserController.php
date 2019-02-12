<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Doctrine\ORM\EntityRepository;
use App\Entity\Dienstbuch;

class UserController extends AbstractController
{
    
    
    
    public function show($id)
{
    $product = $this->getDoctrine()
        ->getRepository(Dienstbuch::class)
        ->find($id);

    if (!$product) {
        throw $this->createNotFoundException(
            'Keine Resultate gefunden '.$id
        );
    }
    $dienstbuch = 'Test '.$product->getName();
    return $this->render('dienstbuch/list.html.twig', [
        'name' => $dienstbuch,
        'desc' => 'test',
    ]);
    
    }

    public function newMessages() {
        return new Response ('26'); 
    }
}

?>