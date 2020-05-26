<?php


namespace App\Service;


use Doctrine\ORM\EntityManagerInterface;

class AdvertClean
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function clean($day)
    {
        $advertRepository = $this->em->getRepository('App:Advert');
        $avertSkillRepository = $this->em->getRepository('App:AdvertSkill');

        $date = new \DateTime($days . ' days ago');
        $listAdverts = $advertRepository->getAdvertsBefore($date);
        foreach ($listAdverts as $advert) {
            $advertSkills = $advertSkillRepository->finBy(array('advert' => '$advert'));
            foreach ($advertSkills as $advertSkill) {
                $this->em->remove($advertSkill);
            }
            $this->em->remove($advert);
        }
        $this->em->flush();
    }
}