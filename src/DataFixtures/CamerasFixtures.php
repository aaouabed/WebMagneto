<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Camera;


class CamerasFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i=1; $i<=10; $i++){
            $camera= new Camera();
            $camera->setLocation("11.111 22.222")
                   ->setCountry("Pays n°$i")
                   ->setName("Camera n°$i")
                   ->setGroupe("Group 1")
                   ->setIpaddr("192.168.1.1")
                   ->setStatus("Disconnected");
            $manager->persist($camera);
        }

        $manager->flush();
    }
}
