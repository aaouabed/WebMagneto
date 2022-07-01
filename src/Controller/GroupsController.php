<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Groups;

class GroupsController extends AbstractController
{
    /**
     * @Route("/groups", name="groups")
     */
    public function index(): Response
    {
        $repo=$this->getDoctrine()->getRepository(Groups::class);
        $groups=$repo->findAll();

        return $this->render('groups/index.html.twig', [
            'controller_name' => 'GroupsController',
            'groups'=>$groups,
        ]);
    }

    /**
     * @Route("/groups/new", name="groups_create")
     */
    public function create(Request $request, ManagerRegistry $manager){
        dump($request);
       

        if($request->request->count()>0){
            $group=new Groups();
            $group->setGroupe($request->request->get('group'))
                ->setStatus($request->request->get('status'));
            
            $manager->getManager()->persist($group);
            $manager->getManager()->flush();
        }
        return $this->render('groups/create.html.twig');
    }


    /**
     * @Route("/groups/{id}/edit", name="group_edit")
     */
    public function edit(int $id, ManagerRegistry $manager, Request $request){
        
        $repo=$this->getDoctrine()->getRepository(Groups::class);
        $groups=$repo->find($id);

        if($request->request->count()>0){
            dump($request);
            $groups->setGroupe($request->request->get('groupe'))
                ->setStatus($request->request->get('status'));
                
            $manager->getManager()->persist($groups);
            $manager->getManager()->flush();
        }
        

        return $this->render('groups/edit.html.twig' , ['groups'=>$groups,]);
        
          }



    
     /**
     * @Route("/groups/delete/{id}", name="group_delete")
     */
    public function delete(int $id, ManagerRegistry $manager){
        
        $repo=$this->getDoctrine()->getRepository(Groups::class);
        $group=$repo->find($id);
        //$users=$repo->findAll();
        $em=$manager-> getManager();
        dump($id);
        //$user=$em->getRepository(Users::class)->find($id);
        
        dump($group);
       
        $em->remove($group);
        $em->flush();
        

        

        return $this->render('groups/delete.html.twig');
        
          }




}
