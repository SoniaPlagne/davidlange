<?php

namespace App\Tests;

use App\Entity\Actualite;
use PHPUnit\Framework\TestCase;

class ActualiteTest extends TestCase
{
    public function testIsTrue()
    {
        $actualite= new Actualite();

        $actualite->setTitre('Titre')
                  ->setContenu('Voici le contenu attendu');

        $this->assertTrue($actualite->getTitre() === 'Titre');
        $this->assertTrue($actualite->getContenu() === 'Voici le contenu attendu');
    }

    public function testIsFalse()
    {
        $actualite= new Actualite();

        $actualite->setTitre('Titre')
                  ->setContenu('Voici le contenu attendu');
         

        $this->assertFalse($actualite->getTitre() === 'Un autre titre différent');
        $this->assertFalse($actualite->getContenu() === 'false');
    
    }

    public function testIsEmpty()
    {
        $actualite= new Actualite();

        $this->assertEmpty($actualite->getTitre());
        $this->assertEmpty($actualite->getContenu());
    
    }


}
