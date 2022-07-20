<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Camera;

class CctvController extends AbstractController
{
    /**
     * @Route("/cctv", name="cctv")
     */
    public function index(): Response
    {

        $repo=$this->getDoctrine()->getRepository(Camera::class);
        $cameras=$repo->findAll();
        

        return $this->render('cctv/index.html.twig', [
            'controller_name' => 'CctvController',
            'cameras'=>$cameras,
        ]);
    }

     /**
     * @Route("/cctv/new", name="cctv_create")
     */
    public function create(Request $request, ManagerRegistry $manager){
        dump($request);
       

        if($request->request->count()>0){
            $camera=new Camera();
            $camera->setLocation($request->request->get('location'))
                ->setCountry($request->request->get('country'))
                ->setName($request->request->get('name'))
                ->setGroupe($request->request->get('groupe'))
                ->setIpaddr($request->request->get('ipaddr'))
                ->setStatus($request->request->get('status'))                ;
            
            $manager->getManager()->persist($camera);
            $manager->getManager()->flush();
        }
        return $this->render('cctv/create.html.twig');
    }

    /**
     * @Route("/cctv/{id}/edit", name="cctv_edit")
     */
    public function edit(int $id, ManagerRegistry $manager, Request $request){
        
        $repo=$this->getDoctrine()->getRepository(Camera::class);
        $cameras=$repo->find($id);

        if($request->request->count()>0){
            
            $cameras->setLocation($request->request->get('location'))
                ->setCountry($request->request->get('country'))
                ->setName($request->request->get('name'))
                ->setGroupe($request->request->get('groupe'))
                ->setIpaddr($request->request->get('ipaddr'))
                ->setStatus($request->request->get('status'))                ;
            
            
            $manager->getManager()->persist($cameras);
            $manager->getManager()->flush();
        }
        

        return $this->render('cctv/edit.html.twig' , ['cameras'=>$cameras,]);
        
          }

    
    
     /**
     * @Route("/cctv/delete/{id}", name="cctv_delete")
     */
    public function delete(int $id, ManagerRegistry $manager){
        
        $repo=$this->getDoctrine()->getRepository(Camera::class);
        $camera=$repo->find($id);
        //$users=$repo->findAll();
        $em=$manager-> getManager();

        //$user=$em->getRepository(Users::class)->find($id);
        $em->remove($camera);
        $em->flush();
        

        

        return $this->render('cctv/delete.html.twig');
        
          }



     /**
     * @Route("/cctv/live", name="live_monitoring")
     */
    public function live(Request $request, ManagerRegistry $manager){
        //composer install --ignore-platform-reqs

        return $this->render('cctv/live.html.twig');
    }


}
