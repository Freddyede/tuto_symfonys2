<?php

namespace App\Repository;

use App\Entity\Produces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Produces|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produces|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produces[]    findAll()
 * @method Produces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProducesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produces::class);
    }

    // /**
    //  * @return Produces[] Returns an array of Produces objects
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
    public function findOneBySomeField($value): ?Produces
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
