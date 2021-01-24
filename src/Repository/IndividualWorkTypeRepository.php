<?php

namespace App\Repository;

use App\Entity\Individual\WorkType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WorkType|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkType|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkType[]    findAll()
 * @method WorkType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IndividualWorkTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkType::class);
    }

    // /**
    //  * @return IndividualWorkType[] Returns an array of IndividualWorkType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IndividualWorkType
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
