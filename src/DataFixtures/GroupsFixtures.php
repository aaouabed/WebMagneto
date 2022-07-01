<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Groups;

class GroupsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i=1; $i<=10; $i++){
            $groups= new Groups();
            $groups->setGroupe("Groupe X")
                   ->setStatus("Inactive");
            $manager->persist($groups);
        }




        $manager->flush();
    }
}
