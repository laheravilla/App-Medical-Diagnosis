<?php

namespace App\Repository;

use App\Entity\FamilyClinicalHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FamilyClinicalHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method FamilyClinicalHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method FamilyClinicalHistory[]    findAll()
 * @method FamilyClinicalHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FamilyClinicalHistoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FamilyClinicalHistory::class);
    }

    // /**
    //  * @return FamilyClinicalHistory[] Returns an array of FamilyClinicalHistory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FamilyClinicalHistory
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
