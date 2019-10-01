<?php

namespace App\Repository;

use App\Entity\ScientificDegree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ScientificDegree|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScientificDegree|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScientificDegree[]    findAll()
 * @method ScientificDegree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScientificDegreeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScientificDegree::class);
    }

    // /**
    //  * @return ScientificDegree[] Returns an array of ScientificDegree objects
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
    public function findOneBySomeField($value): ?ScientificDegree
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
