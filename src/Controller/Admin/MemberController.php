<?php

namespace App\Controller\Admin;

use App\Entity\Members;
use App\Form\NewUserFormType;
use App\Form\EditUserFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Controller\AdminController;


class MemberController extends AdminController
{
    private $params;

    public function __construct(Admincontroller $params)
    {
        $this->params = $params;
        
    }
    
    /**
     * @Route("/createmember", name="app_createmember")
     */
    
    
    public function create(Request $request ): Response
    {
        $user = new Members();
        $form = $this->createForm(NewUserFormType::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            
            

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_listmembers');
        }

        return $this->render('members/create.html.twig', [
            'newUserForm' => $form->createView(),
            'params' => $this->params,
            
        ]);
    }

    /**
     * @Route("/editmember/{id}", name="app_editmember")
     */
    public function editmember(Request $request, $id)
    {
        $member = new Members();
        $form2 = $this->createForm(EditUserFormType::class, $member);
        $form2->handleRequest($request);
       
        
        if ($form2->isSubmitted() && $form2->isValid()) {
            // encode the plain password
            $entityManager = $this->getDoctrine()->getManager();
            $item = $entityManager->getRepository(Members::class)->find($id);
            if (!$item) {
                throw $this->createNotFoundException(
                    'Kein Eintrag gefunden mit id: '.$id
                );
            }
            $items = $request->request->get('edit_user_form');
            
            $item->setFirstname($items['firstname']);
            $item->setLastname($items['lastname']);
            $item->setCity($items['city']);
            $item->setPostcode($items['postcode']);
            $item->setStreet($items['street']);
            $entityManager->flush();

            // do anything else you need here, like send an email
            $lastname = $item->setLastname($items['lastname']);
            $nachricht = 'Message';
            $this->addFlash('success','Datensatz gespeichert');
            return $this->redirectToRoute('app_listmembers');
            
        }
        $repo = $this->getDoctrine()->getRepository(Members::class);
        
        $found = $repo->findById($id);
        $form2->get('firstname')->setData($found[0]->getFirstname());
        $form2->get('lastname')->setData($found[0]->getLastname());
        $form2->get('street')->setData($found[0]->getStreet());
        $form2->get('postcode')->setData($found[0]->getPostCode());
        $form2->get('city')->setData($found[0]->getCity());

        return $this->render('members/edit.html.twig', [
            'firstname' => 'test',
            'lastname' => 'lastname',
            'editUserForm' => $form2->createView(),
            'id' => $id,
            'params' => $this->params,
        ]);
           
    }
    
    /**
     * @Route("/listmembers", name="app_listmembers")
     */
    public function list()
    {
        
        $membersRepository = $this->getDoctrine()->getRepository(Members::class);
        $members = $membersRepository->findAll();
        $message = '';
        if(isset($getmessage)) { $message = $getmessage; }

        //dd($this->params);
        return $this->render('members/list.html.twig', [
            'members' => $members,
            'message' => $message,
            'sitename' => 'Alle Mitglieder',
            'params' => $this->params,
            'breadcrumbs' => 'Mitglieder',
        ]);
    }

    /**
     * @Route("/deletemember/{id}", name="app_deletemember")
     */
    public function deleteMember(Members $id)
        {
            if (!$id) {
                throw $this->createNotFoundException('Kein Eintrag gefunden');
            }

            $em = $this->getDoctrine()->getRepository(Members::class);
            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($id);
            $em->flush();
            $this->addFlash('danger','Datensatz gelöscht');
            return $this->redirectToRoute('app_listmembers');
        }
}
