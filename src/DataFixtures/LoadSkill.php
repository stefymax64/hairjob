<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoadSkill extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $names = [
            'Diagnostic capillaire',
            'Techniques de coupes de cheveux',
            'Techniques de séchage',
            'Principes de la relation client',
            'Coiffure femme',
            'Coiffure homme',
            'Coiffure enfant',
            'Technique de la barbe',
            'Techniques de décoloration, de coloration de cheveux',
            'Techniques de raccord, de rajouts, d\'extensions',
            'Techniques de pose de perruques',
            'Techniques pédagogiques',
            'Gestion administrative',
            'Gestion comptable',
            'Outils bureautiques'
        ];

        foreach ($names as $name) {
            $skills = new Skill();
            $skills->setName($name);
            $manager->persist($skills);
        }
        $manager->flush();
    }
}