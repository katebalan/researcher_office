<?php

namespace App\Repository;

use App\Entity\IndividualWork;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method IndividualWork|null find($id, $lockMode = null, $lockVersion = null)
 * @method IndividualWork|null findOneBy(array $criteria, array $orderBy = null)
 * @method IndividualWork[]    findAll()
 * @method IndividualWork[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IndividualWorkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IndividualWork::class);
    }

     /**
      * @return IndividualWork[] Returns an array of IndividualWork objects
      */
    public function findByCanonicalType($value)
    {
        return $this->createQueryBuilder('iw')
            ->leftJoin('iw.type', 'type')
            ->andWhere('type.canonical = :val')
            ->setParameter('val', $value)
            ->orderBy('iw.createdAt', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?IndividualWork
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
