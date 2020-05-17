<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoadCategory extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $names = array(
            'Manager',
            'Gérant/e',
            'Coiffeur/se',
            'Coiffeur mixte (H/F)',
            'Coiffeur Homme',
            'Coiffeur polyvalent',
            'Coiffeur studio',
            'Technicien/ne',
            'Apprenti(e) C.A.P',
            'Appenti(e) B.P',
            'Stagiaire',
            'Formateur/trice',
            'Professeur de coiffure'
        );

        foreach ($names as $name)
        {
            $category = new Category();
            $category->setName($name);

            $manager->persist($category);
        }
        $manager->flush();
    }
}
