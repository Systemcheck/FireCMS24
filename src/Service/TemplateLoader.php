<?php
namespace App\Service;

class TemplateLoader
{
    public function loadAdminTpl()
    {
        $repo = $this->getDoctrine()->getRepository(Templates::class);
        $found = $repo->findAdminTemplate();
        $tpl = $found[0]->getPath();
         return 'administrator/'.$tpl.'/';
    }
}