<?php

namespace App\DataFixtures;

use App\Entity\Marque;
use App\Entity\Modele;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CatalogueFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $catalogue = [
            'Yamaha'    => ['Mt-03', 'Mt-05', 'Mt-09'],
            'BMW'       => ['R1200','R80 Rt', 'R100 Gs'], 
            'Triumph'   => ['Bonneville', 'Speed Triple', 'Street Triple', 'Tiger'], 
            'Harley'    => ['Low Rider','Road King','Sportster','Street Glide'],
        ];
        foreach($catalogue as $nom_marque=>$modeles) {
            $marque = new Marque();
            $marque->setLibelle($nom_marque);
            foreach($modeles as $nom_modele) {
                $modele = new Modele();
                $modele->setLibelle($nom_modele);
                $manager->persist($modele);
                $marque->addModele($modele);
            }
            $manager->persist($marque);
        }
        $manager->flush();
    }
}
