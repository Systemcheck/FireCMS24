<?php

namespace App\Repository;

use App\Entity\Members;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query as Query;
use Doctrine\ORM\Mapping as ORM;

/**
 * @method Members|null find($id, $lockMode = null, $lockVersion = null)
 * @method Members|null findOneBy(array $criteria, array $orderBy = null)
 * @method Members[]    findAll()
 * @method Members[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MembersRepository extends ServiceEntityRepository
{
    protected $choices;
    
    protected $values;
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Members::class);
    }

    /**
     * @return Members[]
     */
    
    public function getChoices()
    {
        
        
        return $this->choices;
    }
    
    
     public function findAllByExecutive()
    {
        return $this->createQueryBuilder('u')
        ->select('partial u.{id, firstname, lastname}')
            ->orderBy('u.lastname', 'ASC')
            ->add('where', 'u.executive = 1')
            ->getQuery()
            
            ->execute();
    }

    public function findAllMembers()
    {
        return $this->createQueryBuilder('u')
        ->select('partial u.{id, firstname, lastname}')
            ->orderBy('u.lastname', 'ASC')
            ->getQuery()
            ->execute()
        ;
    }

    public function getValues()
    {
        $values = array('1' => 'Anwesend', '2' => 'entschuldigt');
        return $this->values;
    }
    
    // /**
    //  * @return Members[] Returns an array of Members objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Members
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
