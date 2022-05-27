<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
class UserFixtures extends Fixture
{
    private $hasher;
    public function __construct(UserPasswordHasherInterface  $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0 ; $i < 10 ; $i++){
            $user = new User();
            $user->setEmail($faker->email());
            $user->setPseudo($faker->lastName());
            $user->setRoles(["ROLE_USER"]);

            $password = "azerty";
            $hash = $this->hasher->hashPassword($user,$password);
            $user->setPassword($hash);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
