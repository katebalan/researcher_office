<?php

namespace App\Repository;

use App\Entity\IndividualWorkType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method IndividualWorkType|null find($id, $lockMode = null, $lockVersion = null)
 * @method IndividualWorkType|null findOneBy(array $criteria, array $orderBy = null)
 * @method IndividualWorkType[]    findAll()
 * @method IndividualWorkType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IndividualWorkTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IndividualWorkType::class);
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
