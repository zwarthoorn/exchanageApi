<?php

namespace App\Repository;

use App\Entity\PriceNow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PriceNow|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriceNow|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriceNow[]    findAll()
 * @method PriceNow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriceNowRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PriceNow::class);
    }

    // /**
    //  * @return PriceNow[] Returns an array of PriceNow objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PriceNow
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
