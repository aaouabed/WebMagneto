<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Users;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i=1; $i<=10; $i++){
            $user= new Users();
            $user->setFirstName("prenom $i")
                   ->setLastname("nom $i")
                   ->setEmail("user$i@fixtures.fr")
                   ->setGroupe("Group X")
                   ->setRole("User")
                   ->setStatus("Inactive");
            $manager->persist($user);
        }
        
        $manager->flush();
    }
}
