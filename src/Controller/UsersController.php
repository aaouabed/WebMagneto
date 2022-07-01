<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Users;

class UsersController extends AbstractController
{
    /**
     * @Route("/users", name="users")
     */
    public function index(): Response
    {

        $repo=$this->getDoctrine()->getRepository(Users::class);
        $users=$repo->findAll();

        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
            'users'=>$users,
        ]);
    }

    /**
     * @Route("/users/new", name="users_create")
     */
    public function create(Request $request, ManagerRegistry $manager){
        dump($request);
       

        if($request->request->count()>0){
            $user=new Users();
            $user->setFirstName($request->request->get('prenom'))
                ->setLastName($request->request->get('nom'))
                ->setEmail($request->request->get('email'))
                ->setGroupe($request->request->get('groupe'))
                ->setRole($request->request->get('role'))
                ->setStatus($request->request->get('status'));
            
            $manager->getManager()->persist($user);
            $manager->getManager()->flush();
        }
        return $this->render('users/create.html.twig');
    }

    /**
     * @Route("/users/{id}/edit", name="user_edit")
     */
    public function edit(int $id, ManagerRegistry $manager, Request $request){
        
        $repo=$this->getDoctrine()->getRepository(Users::class);
        $users=$repo->find($id);

        if($request->request->count()>0){
            
            $users->setFirstName($request->request->get('prenom'))
                ->setLastName($request->request->get('nom'))
                ->setEmail($request->request->get('email'))
                ->setGroupe($request->request->get('groupe'))
                ->setRole($request->request->get('role'))
                ->setStatus($request->request->get('status'));
            
            $manager->getManager()->persist($users);
            $manager->getManager()->flush();
        }
        

        return $this->render('users/edit.html.twig' , ['users'=>$users,]);
        
          }

    


     /**
     * @Route("/users/delete/{id}", name="user_delete")
     */
    public function delete(int $id, ManagerRegistry $manager){
        
        $repo=$this->getDoctrine()->getRepository(Users::class);
        $user=$repo->find($id);
        $users=$repo->findAll();
        $em=$manager-> getManager();
        dump($id);
        //$user=$em->getRepository(Users::class)->find($id);
        
        dump($user);
       
        $em->remove($user);
        $em->flush();
        

        

        return $this->render('users/delete.html.twig');
        
          }




     /**
     * @Route("/users/search", name="user_search")
     */
    public function search( ManagerRegistry $manager, Request $request){
        
        $repo=$this->getDoctrine()->getRepository(Users::class);
        $users=$repo->findBy(array('FirstName'=>'prenom 2'));
        dump($users);
        
        

        return $this->render('users/search.html.twig' , ['users'=>$users,]);
        
          }



}
