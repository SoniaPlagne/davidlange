<?php

namespace App\Tests;

use App\Entity\Emploi;
use PHPUnit\Framework\TestCase;

class EmploiTest extends TestCase
{
    public function testIsTrue()
    {
        $emploi= new Emploi();

        $emploi->setTitre('Titre Emploi')
               ->setDescriptif('Descriptif');

        $this->assertTrue($emploi->getTitre() === 'Titre Emploi');
        $this->assertTrue($emploi->getDescriptif() === 'Descriptif');
    }

    public function testIsFalse()
    {
        $emploi= new Emploi();

        $emploi->setTitre('Titre Emploi')
               ->setDescriptif('Descriptif');

        $this->assertFalse($emploi->getTitre() === 'False');
        $this->assertFalse($emploi->getDescriptif() === 'False desc');
    }

    public function testIsEmpty()
    {
        $emploi= new Emploi();

        $this->assertEmpty($emploi->getTitre());
        $this->assertEmpty($emploi->getDescriptif());
    
    }


}

