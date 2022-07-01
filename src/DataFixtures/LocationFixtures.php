<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Location;


class LocationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i=1; $i<=10; $i++){
            $user= new Location();
            $user->setGroupe("Groupe $i")
                   ->setName("nom $i")
                   ->setCountry("FR")
                   ->setCity("Paris")
                   ->setGps("48.858335, 2.294349");
                   
            $manager->persist($user);
        }

        $manager->flush();
    }
    
}
