<?php

namespace App\Widgets\MainMenu;

use Symfony\Component\HttpFoundation\Response;

use App\Controller\WidgetController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MainMenu extends AbstractController
{   
    private $modules;
    private $em;
    
    public function __construct() {
       
        return 'Mainmenu';
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
