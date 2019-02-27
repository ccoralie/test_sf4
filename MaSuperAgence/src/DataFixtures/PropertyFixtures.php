<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class PropertyFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i =1; $i<100; $i++) {
            $property = new Property();
            $property
                ->setTitle('Appartement n°' .$i)
                ->setDescription($faker->paragraph(3,true))
                ->setRooms($faker->numberBetween(1,10))
                ->setBedrooms($faker->numberBetween(1,9))
                ->setFloor($faker->numberBetween(0,15))
                ->setPrice($faker->numberBetween(100000,1000000))
                ->setHeat($faker->numberBetween(0, count(Property::HEAT) -1))
                ->setCity($faker->city)
                ->setAdress($faker->streetAddress)
                ->setPostalCode($faker->numberBetween(01100, 98834))
                ->setSold(false)
                ->setImage($faker->imageUrl('300', '230'))
                ->setSurface($faker->numberBetween(20,250));
            $manager->persist($property);
        }
        $manager->flush();

    }
}
