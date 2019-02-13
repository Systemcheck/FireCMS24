<?php
namespace App\Controller\Admin;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\AdminController;

class DashboardController extends AdminController
{
    private $params;

    public function __construct(Admincontroller $params)
    {
        $this->params = $params;
        
    }

    public function index()
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'params' => $this->params,
        ]);
    }
}
