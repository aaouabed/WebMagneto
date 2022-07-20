<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
     /*   $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );  

        
        $get_request="https://139.99.4.63:7001/media/60c050e9-9b26-912a-fd24-441e94b38bbc.webm?pos=2022-06-27T10:50:00&duration=2";
        $video= file_get_contents($get_request,false, stream_context_create($arrContextOptions));
        dump($video);*/
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

  

    
}
