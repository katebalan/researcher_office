<?php

namespace App\Repository;

use App\Entity\ScientificIdentity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ScientificIdentity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScientificIdentity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScientificIdentity[]    findAll()
 * @method ScientificIdentity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScientificIdentityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScientificIdentity::class);
    }

    // /**
    //  * @return ScientificIdentity[] Returns an array of ScientificIdentity objects
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
    public function findOneBySomeField($value): ?ScientificIdentity
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
