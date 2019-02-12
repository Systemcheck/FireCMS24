<?php

namespace App\Controller;

use App\Entity\Templates;
use App\Entity\WidgetPositions;
use App\Repository\TemplatesRepository;
use App\Repository\WidgetPositionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

use Symfony\Component\Routing\Route as Routing;


class AdminController extends AbstractController
{
    private $tpl;
    private $em;
    private $widgets;
    private $params = array();
    private $widget;
    private $request;
    private $pathInfo;
    
    
    public function __construct(RequestStack $requestStack, EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->requestStack = $requestStack;
        $request = $this->requestStack->getCurrentRequest();
        $this->params['tpl'] = $this->getTpl();
        $this->params['sitename'] = $this->sitename();
        $this->params['widgets'] = $this->widgets();
        $this->params['pathInfo'] = $this->getpathInfo();
        return $this->params;
    }   
   
    
    public function sitename() {
        return 'FireCMS';
    }

    public function getpathInfo() {
        $this->pathInfo = '/admin/dashboard/';
        return $this->pathInfo;
    }    
        
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    public function widgets()
    {
        $wid = array();
        $route = $this->getPathInfo();
        
        $repo = $this->em->getRepository(WidgetPositions::class);
        $widgets = $repo->findActiveWidgets($route);
        $i = 0;
        foreach( $widgets as $widget) {
        $wid[] = $widgets[$i]->getWidgetId();
        $i++;
    }
        return $wid;
    }

    public function getTpl()
    {   
        $repo = $this->em->getRepository(Templates::class);
        $found = $repo->findAdminTemplate();
        $tpl = $found[0]->getPath();
        
         return 'administrator/'.$tpl.'/';
    }
}
