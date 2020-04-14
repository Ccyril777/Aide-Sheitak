<?php

namespace App\DataFixtures;

use App\Entity\Leaf;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class LeafFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 20; $i++) {
            $leaf = new leaf();
            $leaf->setName($faker->name);
            $leaf->setDescription($faker->text);
            $manager->persist($leaf);
        }
        $manager->flush();
    }
}
