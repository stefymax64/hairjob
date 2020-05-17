<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Skill;

class LoadSkill extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $names=array(
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
        );

        foreach ($names as $name)
        {
            $skill = new Skill();
            $skill->setName($name);
            $manager->persist($skill);
        }
        $manager->flush();
    }
}
