<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ClientFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($nbClients = 1; $nbClients <= 5; $nbClients++) {
            $client = new Client();

            $client->setName($faker->name);
            $client->setEmail(sprintf('client+%d@gmail.com', $nbClients));
            $client->setPassword($this->passwordHasher->hashPassword($client, 'password'));
            $client->setCreationDate($faker->dateTime);
            $manager->persist($client);

            $this->addReference('client_'. $nbClients, $client);
        }

        $manager->flush();
    }
}
