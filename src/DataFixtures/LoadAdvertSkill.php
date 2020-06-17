<?php

namespace App\DataFixtures;

use App\Entity\AdvertSkill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoadAdvertSkill extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $levels = [
            'Débutant(e)',
            'Intermédiaire',
            'Confirmé(é)',
            'Qualifié(é)',
            'Hautement qualifié(é)'
        ];

        foreach ($levels as $level) {
            $advert_skills = new AdvertSkill();
            $advert_skills->setLevel($level);
            $manager->persist($advert_skills);
        }
        $manager->flush();
    }
}