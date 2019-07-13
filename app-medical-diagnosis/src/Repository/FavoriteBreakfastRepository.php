<?php

namespace App\Repository;

use App\Entity\FavoriteBreakfast;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FavoriteBreakfast|null find($id, $lockMode = null, $lockVersion = null)
 * @method FavoriteBreakfast|null findOneBy(array $criteria, array $orderBy = null)
 * @method FavoriteBreakfast[]    findAll()
 * @method FavoriteBreakfast[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FavoriteBreakfastRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FavoriteBreakfast::class);
    }

    // /**
    //  * @return FavoriteBreakfast[] Returns an array of FavoriteBreakfast objects
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
    public function findOneBySomeField($value): ?FavoriteBreakfast
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
