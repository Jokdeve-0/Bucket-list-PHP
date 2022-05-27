<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Wish;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $categoriesFixtures = ["Travel & Adventure","Sport","Entertainment","Human Relations","Others"];
        $categoriesRegister = [];
        foreach ($categoriesFixtures as $cat){
            $category = new Category();
            $category->setName($cat);
            $manager->persist($category);
            $categoriesRegister[] = $category;
        }
        for ($i = 0 ; $i < 50 ; $i++){
            $wish = new Wish();
            $wish->setCategory($categoriesRegister[rand(0,4)]);
            $wish->setTitle($faker->sentence(rand(3,8)));
            $wish->setDescription($faker->sentence(rand(10,20)));
            $wish->setAuthor($faker->lastName);
            $wish->setIsPublished(true);
            $wish->setDateCreated($faker->dateTime);

            $manager->persist($wish);
        }
        $manager->flush();
    }
}
