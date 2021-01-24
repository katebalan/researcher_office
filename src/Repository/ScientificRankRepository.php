<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\ScientificRank;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ScientificRank|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScientificRank|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScientificRank[]    findAll()
 * @method ScientificRank[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScientificRankRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScientificRank::class);
    }

    // /**
    //  * @return ScientificRank[] Returns an array of ScientificRank objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ScientificRank
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
