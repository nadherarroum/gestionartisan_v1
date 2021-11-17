<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager): void
    {
        // Using Faker
        $faker = Factory::create('en_EN');

        // Creat a fake user
        $user = new User();

        $user->setEmail('user@test.com')
            ->setNom('userNom')
            ->setPrenom('userPrenom')
            ->setTelephone('12345678')
            ->setCin('12345678')
            ->setAddress($faker->text())
            ->setRoles(['ROLE_USER']);

        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);

        $manager->flush();
    }
}
