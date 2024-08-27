<?php

namespace App\DataFixtures;

use App\Entity\Identifiant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passhash;
    
    public function __construct(UserPasswordHasherInterface $passhash)
    {
        $this->passhash = $passhash;
    }
    public function load(ObjectManager $manager): void
    {
        $user = new Identifiant();

        $user->setEmail('test@test.fr');
        $user->setPseudo('test');
        $user->setRowguid('123456');
        $user->setPassword($this->passhash->hashPassword($user, "123"));
        
        $manager->persist($user);
        $manager->flush();
    }
}
