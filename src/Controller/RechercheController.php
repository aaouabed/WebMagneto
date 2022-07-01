<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\SearchElasticType;
use App\Repository\SearchRepository;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Objet;
use App\Entity\Result;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Form\AdvancedType;

class RechercheController extends AbstractController
{
    /**
     * @Route("/recherche", name="recherche")
     */
    public function index(Request $request): Response
    {   
        $form=$this-> createForm(SearchElasticType::class);
        $search =$form -> handleRequest($request);
        $objects[]=null;  
        
        if($form-> isSubmitted() && $form -> isValid()){
            $mot=$search -> get('mots')->getData();
            $mot=str_replace(' ','+',$mot);
            //lien de recherche
            $link="http://192.168.10.152:9200/syra_id_1/_search?q=";
            $link.=$mot;
            dump($link);
            //GET 
            $xml= file_get_contents($link);
            //convert result to json
            $json=json_decode($xml);
            dump($json);

            //serialize declaration
            $normalizers = [new ObjectNormalizer()];
            $encoders = [new XmlEncoder(), new JsonEncoder()];
            $serializer = new Serializer($normalizers, $encoders);

           /*  $objet= new Objet();
            $taille=count($json->hits->hits);
            
            for($i=0;$i<$taille;$i++){
                $obj= $json->hits->hits[$i]->_source->object;
                $xxml= json_encode($obj);
                $productDeserialized = $serializer->deserialize($xxml, Objet::class, 'json',  array('Objet' => $objet));
                $objects[$i]=$productDeserialized;
                
            }
            dump($objects);
            */
            $taille=count($json->hits->hits);
            dump($taille);


            //declaration tableau contenant les resultats
            for($i=0;$i<$taille;$i++){
            $results[$i]=new Result();
            }
            
            
            for($i=0;$i<$taille;$i++){
           
            $results[$i]->setObjectName($json->hits->hits[$i]->_source->object->name);
            $results[$i]->setObjectId($json->hits->hits[$i]->_source->object->object_id);
            $results[$i]->setObjectConfidence($json->hits->hits[$i]->_source->object->confidence);
            $results[$i]->setObjectPositionX($json->hits->hits[$i]->_source->object->position->center_x);
            $results[$i]->setObjectPositionY($json->hits->hits[$i]->_source->object->position->center_y);
            $results[$i]->setObjectWidth($json->hits->hits[$i]->_source->object->position->width);
            $results[$i]->setObjectHeight($json->hits->hits[$i]->_source->object->position->height);
            $results[$i]->setObjectSize($json->hits->hits[$i]->_source->object->size);
            $results[$i]->setCameraUrl($json->hits->hits[$i]->_source->view->camera->url);
            $results[$i]->setCameraFocal($json->hits->hits[$i]->_source->view->camera->properties->focal);
            $results[$i]->setCameraSensorWidth($json->hits->hits[$i]->_source->view->camera->properties->sensor_width);
            $results[$i]->setCameraSensorLength($json->hits->hits[$i]->_source->view->camera->properties->sensor_length);
            $results[$i]->setCameraPosition($json->hits->hits[$i]->_source->view->camera->properties->position);
            $results[$i]->setTimestamp($json->hits->hits[$i]->_source->timestamp);

            //attribution code couleur LAB
            if(($json->hits->hits[$i]->_source->object->dominant_colors)!= null){
            $results[$i]->setObjectDominantColors1($json->hits->hits[$i]->_source->object->dominant_colors[0][1][0]);
            $results[$i]->setObjectDominantColor2($json->hits->hits[$i]->_source->object->dominant_colors[0][1][1]);
            $results[$i]->setObjectDominantColors3($json->hits->hits[$i]->_source->object->dominant_colors[0][1][2]);
            }
        
                
        }


            dump($results);
            return $this->render('recherche/index.html.twig', [
                'controller_name' => 'RechercheController',
                'form'=> $form -> createView(),
                'objects'=> $results
            ]);
        }
        
        
        
        return $this->render('recherche/index.html.twig', [
            'controller_name' => 'RechercheController',
            'form'=> $form -> createView(),
            'objects'=> null
            
        ]);
    }


    /**
     * @Route("/recherche/advanced", name="recherche_advanced")
     */
    public function advanced(Request $request): Response
    {   
       


        return $this->render('recherche/advanced.html.twig', [
            'controller_name' => 'RechercheController',                       
        ]);
    }

}
