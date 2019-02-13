<?php

namespace App\Widgets\Operations;

use Symfony\Component\HttpFoundation\Response;

use App\Controller\WidgetController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class Operations extends AbstractController
{   
    private $modules;
    private $em;
    
    public function __construct() {
       
        return 'Operations';
    }
    
    public function view() //pflicht
    {
        $this->view = 'views/main.html.twig';
        return $this->view;
    }

    public function params() //pflicht
    {
        $this->params = array(0 => 'link 1', 1 => 'link 2');
        return $this->params;
    }

}
