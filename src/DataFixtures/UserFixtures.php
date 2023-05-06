<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $genders = ['male', 'female'];

        for ($nbUsers = 1; $nbUsers <= 30; $nbUsers++) {
            $user = new User();

            $gender = $faker->randomElement($genders);

            $picture = 'https://randomuser.me/api/portraits/';
            $pictureId = $faker->numberBetween(1, 99) . '.jpg';

            $picture .= ($gender === 'male' ? 'men/' : 'women/') . $pictureId;

            $user->setFirstName($faker->firstName($gender));
            $user->setLastName($faker->lastName());
            $user->setEmail(sprintf('user+%d@gmail.com', $nbUsers));
            $user->setPicture($picture);
            $user->setCreationDate($faker->dateTime);
            $manager->persist($user);

            $this->addReference('user_'. $nbUsers, $user);
        }

        $manager->flush();
    }
}
