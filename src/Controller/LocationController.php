<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Location;


class LocationController extends AbstractController
{
    /**
     * @Route("/location", name="location")
     */
    public function index(): Response
    {   
        $repo=$this->getDoctrine()->getRepository(Location::class);
        $locations=$repo->findAll();
        return $this->render('location/index.html.twig', [
            'controller_name' => 'LocationController',
            'locations'=>$locations,
        ]);
    }

    /** 
     * @Route("/location/new", name="location_create")
     */
    public function create(Request $request, ManagerRegistry $manager){
        dump($request);
       

        if($request->request->count()>0){
            $location=new Location();
            $location->setGroupe($request->request->get('groupe'))
                ->setName($request->request->get('name'))
                ->setCountry($request->request->get('country'))
                ->setCity($request->request->get('city'))
                ->setGps($request->request->get('gps'));
                
            
            $manager->getManager()->persist($location);
            $manager->getManager()->flush();
        }
        return $this->render('location/create.html.twig');
    }


     /**
     * @Route("/location/{id}/edit", name="location_edit")
     */
    public function edit(int $id, ManagerRegistry $manager, Request $request){
        
        $repo=$this->getDoctrine()->getRepository(Location::class);
        $locations=$repo->find($id);

        if($request->request->count()>0){
            
            $locations->setGroupe($request->request->get('groupe'))
            ->setName($request->request->get('name'))
            ->setCountry($request->request->get('country'))
            ->setCity($request->request->get('city'))
            ->setGps($request->request->get('gps'));
            
            $manager->getManager()->persist($locations);
            $manager->getManager()->flush();
        }
        

        return $this->render('location/edit.html.twig' , ['locations'=>$locations,]);
        
          }

    

    /**
     * @Route("/location/delete/{id}", name="location_delete")
     */
    public function delete(int $id, ManagerRegistry $manager){
        
        $repo=$this->getDoctrine()->getRepository(Location::class);
        $user=$repo->find($id);
        $users=$repo->findAll();
        $em=$manager-> getManager();
        dump($id);
        //$user=$em->getRepository(Users::class)->find($id);
        
        dump($user);
       
        $em->remove($user);
        $em->flush();
        

        

        return $this->render('location/delete.html.twig');
        
          }


}
