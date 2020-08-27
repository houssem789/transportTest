<?php

namespace App\Repository;

use App\Entity\ModeTransport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModeTransport|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModeTransport|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModeTransport[]    findAll()
 * @method ModeTransport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModeTransportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModeTransport::class);
    }

    // /**
    //  * @return ModeTransport[] Returns an array of ModeTransport objects
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
    public function findOneBySomeField($value): ?ModeTransport
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
