<?php

namespace App\Repository;

use App\Entity\FavoriteDrink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FavoriteDrink|null find($id, $lockMode = null, $lockVersion = null)
 * @method FavoriteDrink|null findOneBy(array $criteria, array $orderBy = null)
 * @method FavoriteDrink[]    findAll()
 * @method FavoriteDrink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FavoriteDrinkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FavoriteDrink::class);
    }

    // /**
    //  * @return FavoriteDrink[] Returns an array of FavoriteDrink objects
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
    public function findOneBySomeField($value): ?FavoriteDrink
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
