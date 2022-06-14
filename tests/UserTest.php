<?php
#pour jouer le test: php bin/phpunit --testdox

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIsTrue()
    {
        $user= new User();

        $user->setEmail('toto@test.com')
              ->setPrenom('monprenom')
              ->setNom('monnom')
              ->setPassword('monMDP');

        $this->assertTrue($user->getEmail() === 'toto@test.com');
        $this->assertTrue($user->getPrenom() === 'monprenom');
        $this->assertTrue($user->getNom() === 'monnom');
        $this->assertTrue($user->getPassword() === 'monMDP');
    }

    public function testIsFalse()
    {
        $user= new User();

        $user->setEmail('toto@test.com')
              ->setPrenom('monprenom')
              ->setNom('monnom')
              ->setPassword('monMDP');

        $this->assertFalse($user->getEmail() === 'false@test.com');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
    }

    public function testIsEmpty()
    {
        $user= new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPassword());
    }


}
