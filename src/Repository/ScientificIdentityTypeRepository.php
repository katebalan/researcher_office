<?php

namespace App\Repository;

use App\Entity\ScientificIdentityType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ScientificIdentityType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScientificIdentityType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScientificIdentityType[]    findAll()
 * @method ScientificIdentityType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScientificIdentityTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScientificIdentityType::class);
    }

    // /**
    //  * @return ScientificIdentityType[] Returns an array of ScientificIdentityType objects
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
    public function findOneBySomeField($value): ?ScientificIdentityType
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
