<?php

namespace App\Repository;

use App\Entity\Dienstbuch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Dienstbuch|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dienstbuch|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dienstbuch[]    findAll()
 * @method Dienstbuch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DienstbuchRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Dienstbuch::class);
    }

    // /**
    //  * @return Dienstbuch[] Returns an array of Dienstbuch objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dienstbuch
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
