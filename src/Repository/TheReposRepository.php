<?php

namespace App\Repository;

use App\Entity\TheRepos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TheRepos|null find($id, $lockMode = null, $lockVersion = null)
 * @method TheRepos|null findOneBy(array $criteria, array $orderBy = null)
 * @method TheRepos[]    findAll()
 * @method TheRepos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TheReposRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TheRepos::class);
    }

    // /**
    //  * @return TheRepos[] Returns an array of TheRepos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TheRepos
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
