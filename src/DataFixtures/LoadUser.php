<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\AppFixtures;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoadUser extends AppFixtures
{
    private $passwordEncoder;
    public $faker;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(10, 'main_users', function ($i)
        {
            $user = new User();
            $user->setEmail(sprintf('spacebar%d@example.com', $i));
            $user->setFirstName($this->faker->firstName);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user, 'engage'
            ));

            return $user;
        });

        $manager->flush();
    }
}
