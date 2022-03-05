<?php

namespace App\DataFixtures;

use App\Entity\Emploi;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmploiFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <=10;$i++)
        {
            $emploi = new Emploi();
            $emploi->setTitre("Titre de l'emploi n°".$i);
            $emploi->setDescriptif("Ceci est le descriptif de l'emploi proposé");

            $manager->persist($emploi);
        }
       
       
       
        
        $manager->flush();
    }
}
