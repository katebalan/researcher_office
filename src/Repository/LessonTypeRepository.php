<?php

namespace App\Repository;

use App\Entity\LessonType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LessonType|null find($id, $lockMode = null, $lockVersion = null)
 * @method LessonType|null findOneBy(array $criteria, array $orderBy = null)
 * @method LessonType[]    findAll()
 * @method LessonType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LessonTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LessonType::class);
    }

     /**
      * @return LessonType[] Returns an array of LessonType objects
      */
    public function findAllArray()
    {
        return $this->createQueryBuilder('l')
            ->getQuery()
            ->getArrayResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?LessonType
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
