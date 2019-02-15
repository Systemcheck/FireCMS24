<?php

namespace App\Widgets\MainMenu;

use Symfony\Component\HttpFoundation\Response;

use App\Controller\WidgetController;
use App\Entity\Routes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;

class MainMenu extends AbstractController
{   
    private $routes;
    private $em;
    
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
        return 'Mainmenu';
    }
    
    private function getLinks()
    {
        $wid = array();
        
        $repo = $this->em->getRepository(Routes::class);
        $this->routes = $repo->findActiveRoutes();
        
        $i = 0;
        foreach( $this->routes as $route) {
        $newRoutes[$i]['route'] = $route->getRoute();
        $newRoutes[$i]['title'] = $route->getTitle();
        $i++;
        }
        return $newRoutes;
    }
    
    public function view() //pflicht
    {
        $this->view = 'views/main.html.twig';
        return $this->view;
    }

    public function params() //pflicht
    {
        
        
        return $this->getLinks();
    }

}
