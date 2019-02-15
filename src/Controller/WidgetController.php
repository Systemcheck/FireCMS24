<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use App\Entity\WidgetPositions;
use App\Entity\Widgets;
use App\Widgets as WS;

class WidgetController extends AbstractController
{   
    private $modules;
    private $em;
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }
    
     public function index()
    {
        return $this->render('widget_positions/index.html.twig', [
            'controller_name' => 'WidgetPositionsController',
        ]);
    }

    public function loadModules($position, $id, $pathInfo)
    {   
        
        $em = $this->getDoctrine()->getManager();
        $selModules = $em->getRepository(WidgetPositions::class)
        ->findBy(array('position' => $position));
        
        foreach( $selModules as $selModule) {
            $modules = $em->getRepository(Widgets::class)
            ->findOneBy(array('id' => $id)); 
            
            $this->controller = $modules->getModname();
            $controller = 'App\\Widgets\\'.$this->controller.'\\'.$this->controller;
            $this->controller = new $controller($em);
            
            $path = $modules->getModname();
            $tpl = $this->controller->view();
            $this->path = '/'.$path.'/'.$tpl;
            $this->params = $this->controller->params();
      }
      
      return $this->render($this->path, [
          'params' => $this->params,
          'style' => $this->getStyle(),
      ]);
           
    }

    public function getStyle() {
        return 'bg-primary';
    }

    
    
}
