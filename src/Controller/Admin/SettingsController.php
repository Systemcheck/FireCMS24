<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use App\Controller\AdminController;
use App\Entity\Templates;
use App\Repository\TemplatesRepository;


class SettingsController extends AdminController
{


    
     public function index()
    {
        
        
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'Settings',
           
        ]);
    }

    
    public function templates()
    {
        $repo = $this->getDoctrine()->getRepository(Templates::class);
        $found = $repo->findAllTemplates();
        
        $breadcrumbs = array('0' => 'Dashboard', '1' => 'Einstellungen');
        
        return $this->render('settings/templates.html.twig', [
            'controller_name' => 'DashboardController',
            
            'templates' => $found,
            
        ]);
    }
}
