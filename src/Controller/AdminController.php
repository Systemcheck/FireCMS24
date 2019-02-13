<?php

namespace App\Controller;

use App\Entity\Templates;
use App\Entity\WidgetPositions;
use App\Repository\TemplatesRepository;
use App\Repository\WidgetPositionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        $this->request = $request->getPathInfo();
        $this->params['tpl'] = $this->getTpl();
        $this->params['sitename'] = $this->sitename();
        $this->params['widgets'] = $this->widgets();
        $this->params['pathInfo'] = $this->request;
        return $this->params;
    }   
   
    
    public function sitename() {
        return 'FireCMS';
    }

    public function getpathInfo() {
        
        return $this->request;
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
        $repo = $this->em->getRepository(WidgetPositions::class);
        $widgets = $repo->findActiveWidgets($this->request);
        $i = 0;
        foreach( $widgets as $widget) {
        $wid[$widgets[$i]->getPosition()][] = $widgets[$i]->getWidgetId();
        $i++;
    }
       return $wid;
    }

    public function getTpl()
    {   
        $route = $this->getPathInfo();
        
        $tpl = $this->em
        ->getRepository(Templates::class)
        ->findAdminTemplate();
        return 'administrator/'.$tpl[0]['path'].'/';
    }
}
