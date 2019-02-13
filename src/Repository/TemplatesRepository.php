<?php
declare(strict_types=1);
namespace App\Repository;

use App\Entity\Templates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * @method Templates|null find($id, $lockMode = null, $lockVersion = null)
 * @method Templates|null findOneBy(array $criteria, array $orderBy = null)
 * @method Templates[]    findAll()
 * @method Templates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TemplatesRepository extends EntityRepository
{
    

    // /**
    //  * @return Templates[] Returns an array of Templates objects
    //  */
    //
    public function findAdminTemplate()
    {
         return $this->createQueryBuilder('t')
            ->andWhere('t.place = :place AND t.active = :active')
            ->setParameter('place', 'admin')
            ->setParameter('active', '1')
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
            
            
        
    }

    public function findAllTemplates()
    {
        return $this->createQueryBuilder('t')
            
            ->orderBy('t.id', 'ASC')
            
            ->getQuery()
            ->getResult()
        ;
    }
   

    /*
    public function findOneBySomeField($value): ?Templates
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
