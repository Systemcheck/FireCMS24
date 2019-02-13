<?php

namespace App\Repository;

use App\Entity\WidgetPositions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WidgetPositions|null find($id, $lockMode = null, $lockVersion = null)
 * @method WidgetPositions|null findOneBy(array $criteria, array $orderBy = null)
 * @method WidgetPositions[]    findAll()
 * @method WidgetPositions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WidgetPositionsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WidgetPositions::class);
    }

    // /**
    //  * @return WidgetPositions[] Returns an array of WidgetPositions objects
    //  */
    
    public function findActiveWidgets($route)
    {
        $all = 'all';
        return $this->createQueryBuilder('w')
            ->andWhere('w.route = :val OR w.route = :all')
            ->setParameter('all', $all)
            ->setParameter('val', $route)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?WidgetPositions
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
