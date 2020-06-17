<?php

namespace App\Repository;

use App\Entity\AdvertSkill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdvertSkill|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdvertSkill|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdvertSkill[]    findAll()
 * @method AdvertSkill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdvertSkillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdvertSkill::class);
    }

    public function getLikeQueryBuilder($pattern)
    {
        return $this
            ->createQueryBuilder('l')
            ->where('l.level LIKE :pattern')
            ->setParameter('pattern', $pattern);
    }
}