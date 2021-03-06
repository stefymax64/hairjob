<?php

namespace App\Repository;

use App\Entity\Advert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Advert|null find($id, $lockMode = null, $lockVersion = null)
 * @method Advert|null findOneBy(array $criteria, array $orderBy = null)
 * @method Advert[]    findAll()
 * @method Advert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdvertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Advert::class);
    }

    public function getAdvertsBefore(\DateTime $date)
    {
        return $this->createQueryBuilder('a')
            ->where('a.updatedAt <= :date')
            ->orWhere('a.updatedAt IS NULL AND a.date <= :date')
            ->andWhere('a.applications IS EMPTY')
            ->setParameter('date', $date)
            ->getQuery()
            ->getResult();
    }

    public function getAdverts($page, $nbPerPage)
    {
        $query = $this->createQueryBuilder('a')
            ->leftJoin('a.image', 'i')
            ->addSelect('i')
            ->leftJoin('a.categories', 'c')
            ->addSelect('c')
            ->leftJoin('a.skills', 's')
            ->addSelect('s')
            ->leftJoin('a.advert_skills', 'l')
            ->addSelect('l')
            ->orderBy('a.date', 'DESC')
            ->getQuery();

        $query
            ->setFirstResult(($page - 1) * $nbPerPage)
            ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    public function myFindAll()
    {
        //Methode 1 : passe par l'EntityManager
        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('a')
            ->from($this->_entityName, 'a');

        //Méthode 2 : Passe par le raccourci, ce qui est recommandé !
        $queryBuilder = $this->createQueryBuilder('a');

        $query = $queryBuilder->getQuery();
        $results = $query->getResult();
        return $results;

        //return $query->getResult();
    }

    public function myFind()
    {
        $qb = $this->createQueryBuilder('a');
        $qb
            ->where('a.author = :author')
            ->setParameter('author', 'Tête à l\'envers');
        $this->whereCurrentYear($qb);
        $qb->orderBy('a.date', 'DESC');

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function getAdvertWithCategories(array $categoryNames)
    {
        $qb = $this->createQueryBuilder('a');
        $qb
            ->innerJoin('a.categories', 'c')
            ->addSelect('c');
        $qb->where($qb->expr()->in('c.name', $categoryNames));

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function getAdvertWithSkill(array $skillNames)
    {
        $qb = $this->createQueryBuilder('a');
        $qb
            ->innerJoin('a.skills', 's')
            ->addSelect('s');
        $qb->where($qb->expr()->in('s.name', $skillNames));

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function getAdvertWithAdvertSkill(array $advertskillNames)
    {
        $qb = $this->createQueryBuilder('a');
        $qb
            ->innerJoin('a.advert_skills', 'l')
            ->addSelect('l');
        $qb->where($qb->expr()->in('l.level', $advertskillNames));

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function whereCurrentYear(QueryBuilder $qb)
    {
        $qb
            ->andWhere('a.date BETWEEN :start AND :end')
            ->setParameter('start', new \DateTime(date('Y') . '-01-01'))
            ->setParameter('end', new \DateTime(date('Y') . '-12-31'));
    }
}