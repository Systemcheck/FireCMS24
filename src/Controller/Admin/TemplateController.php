<?php

namespace App\Controller\Admin;

use App\Entity\Templates;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class TemplateController extends AbstractController
{
    /**
     * @Route("/addtemplate", name="addtemplate")
     */
    public function index()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Templates();
        $product->setName('Blank');
        $product->setPath('blank');
        $product->setActive(1);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Neues Template gespeichert '.$product->getId(). ' '.$product->getName());
    }

    public function loadtpl() {

        $repo = $this->getDoctrine()->getRepository(Templates::class);
        $found = $repo->findByActive(1);
        $tpl = $found[0]->getPath();
        return $this->render($tpl);
        //return new Response($tpl);
        
    }
}
