<?php

namespace App\Widgets\operations;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use App\Entity\WidgetPositions;
use App\Entity\Widgets;
use App\Controller\WidgetController;

class operations extends WidgetController
{   
    private $modules;
    private $em;
    
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }
    /**
     * @Route("/widget/positions", name="widget_positions")
     */
     public function view()
    {
        return $this->render('widget_positions/index.html.twig', [
            'controller_name' => 'WidgetPositionsController',
        ]);
    }


    public function renderModule($position, $id) {

        
                    
        foreach(  $modules as $module) {
            
            //$name = $module->getId();
           
        }
    }
}
