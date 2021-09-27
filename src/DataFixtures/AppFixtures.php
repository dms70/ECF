<?php

namespace App\DataFixtures;
use app\entity\user;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
#use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;

class AppFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;        
    }


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $user = new User();

        $user -> setEmail('user@test.com');
        #->setPrenom($faker->firstname())
        #->setNom($faker->lastname())
        #->settelephone($faker->phonenumber())
        #->setApropos($faker->text())
        #->setInstagram('Instagram');


        $password = $this->passwordEncoder->HashPassword( $user, 'password' );
        $user->setPassword($password);

        $manager-> persist($user);

        $manager->flush();
    }
}
