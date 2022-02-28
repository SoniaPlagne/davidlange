<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       $user = new User();
       $user->setUsername('Yannick');
       $user->setPassword('$2y$13$HTwaF3DpbyeISCQDE06MCOk7nRehp9azI4z//UvJUUvtoHIcs16.a');
       $manager->persist($user);

       $admin = new User();
       $admin->setUsername('admin');
       $admin->setPassword('$2y$13$2bBXHvhrzb8Zrzw.KNYgcusRa2I.10HhLxTj4vlG/Otj7E4434f86');
       $admin->setRoles(['ROLE_ADMIN']);
       $manager->persist($admin);



        $manager->flush();
    }
}
