<?php

namespace App\Repository;

use App\Entity\TYpeDeco;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TYpeDeco|null find($id, $lockMode = null, $lockVersion = null)
 * @method TYpeDeco|null findOneBy(array $criteria, array $orderBy = null)
 * @method TYpeDeco[]    findAll()
 * @method TYpeDeco[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TYpeDecoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TYpeDeco::class);
    }

    // /**
    //  * @return TYpeDeco[] Returns an array of TYpeDeco objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TYpeDeco
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
