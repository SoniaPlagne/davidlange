<?php

namespace App\DataFixtures;

use App\Entity\Actualite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActualiteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <=25;$i++)

        {
            $actualite = new Actualite();
            $actualite->setTitre("Titre de l'actualité n°".$i);
            $actualite->setContenu("Ceci est le contenu de l'actualité");

            $manager->persist($actualite);

        }
    
        $manager->flush();
    }
}
