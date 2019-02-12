<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use App\Entity\WidgetPositions;
use App\Entity\Widgets;

class WidgetController extends AbstractController
{   
    private $modules;
    private $em;
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }
    /**
     * @Route("/widget/positions", name="widget_positions")
     */
     public function index()
    {
        return $this->render('widget_positions/index.html.twig', [
            'controller_name' => 'WidgetPositionsController',
        ]);
    }

    public function loadModules($position, $id, $pathInfo)
    {   
        $em = $this->getDoctrine()->getManager();
        $modules = $em->getRepository(Widgets::class)
        ->find($id);

        
        //$widgets = $repo->findActiveWidgets($id, $position);
        //dd($pathInfo);
        //$modules->getTitle();
        
        
            return $this->render('widgets/index.html.twig', [
                'controller' => 'top-a'.$id.' - '.$pathInfo,
                //'name' => $name,
                'style' => 'bg-primary',
            ]);
        
        
    }

    public function renderModule($position, $id) {

        
                    
        foreach(  $modules as $module) {
            
            //$name = $module->getId();
           
        }
    }
}
