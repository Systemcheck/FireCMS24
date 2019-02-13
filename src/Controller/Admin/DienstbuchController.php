<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Dienstbuch;
use Symfony\Component\VarDumper\VarDumper;
use App\Form\NewDienstbuchFormType;
use App\Entity\Members;
use App\Repository\MembersRepository;
use App\Controller\AdminController;

class DienstbuchController extends AdminController
{
    private $membersRepository;
    public function __construct(MembersRepository $membersRepository, AdminController $params)
    {
        $this->membersRepository = $membersRepository;
        $this->params = $params;
        
    }


public function create(EntityManagerInterface $em, Request $request )
    {
        $dienstbuch = new Dienstbuch();
        $choices = new Members();
        // $product->setChoice(ProductType::YWING);
        // becomes
        // $product->setChoice(array(ProductType::YWING));
        // or
       
        $form = $this->createForm(NewDienstbuchFormType::class, $dienstbuch);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            /** @var Dienstbuch $dienstbuch */
            $dienstbuch = $form->getData();
            dd($_POST);
            //$em->persist($dienstbuch);
            //$em->flush();
            $this->addFlash('success', 'Article Created! Knowledge is power!');
            
            
            
            
            //$entityManager = $this->getDoctrine()->getManager();
            //$entityManager->persist($user);
            //$entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('dienstbuch.neu', [
                'data' => $dienstbuch,
            ]);
        }
        $members = $this->membersRepository->findAllMembers();
        
        return $this->render('dienstbuch/create.html.twig', [
            'newDbForm' => $form->createView(),
            'members' => $members,
            'params' => $this->params,
            'sitename' => 'Neues Dienstbuch',
            
            
        ]);
    }

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
    $desc = 'Descr';
    return $this->render('dienstbuch/details.html.twig', [
        'id' => $product->getId(),
        'name' => 'unwichtig',
        'desc' => $desc,
    ]);
    
}

public function list()
{
    
    $dienstbuecher = $this->getDoctrine()
        ->getRepository(Dienstbuch::class)
        ->findall();
        


    if (!$dienstbuecher) {
        $this->addFlash('success', 'Keine Einträge vorhanden!');
    }
      
    return $this->render('dienstbuch/list.html.twig', [
        'tabletitle'    => 'Dienstbücher',
        'dienstbuecher' => $dienstbuecher,
        'toolbar'       => true,
        'params'        => $this->params,
    ]);
    
}
    /**
     * Matches /dienstbuch/details/
     *
     * @Route("/dienstbuch/details/{id}", name="dienstbuch_overview")
     */
    public function overview()
    {
        $name = 'Dienstbuch';

        return $this->render('dienstbuch/details.html.twig', [
                    'name' => $name,
                    'id' => $id,
                ]);
        }

    

    
}















?>