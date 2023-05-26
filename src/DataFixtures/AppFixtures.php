<?php

namespace App\DataFixtures;

use App\Entity\Marque;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
      
        $marque1 = new Marque();
        $marque1->setLibelle('KTM');
        $manager->persist($marque1);

        $marque2 = new Marque();
        $marque2->setLibelle('Triumph');
        $manager->persist($marque2);

        $manager->flush();
    }
}
