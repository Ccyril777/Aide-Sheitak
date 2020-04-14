<?php

namespace App\Repository;

use App\Entity\Workbook;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Workbook|null find($id, $lockMode = null, $lockVersion = null)
 * @method Workbook|null findOneBy(array $criteria, array $orderBy = null)
 * @method Workbook[]    findAll()
 * @method Workbook[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkbookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Workbook::class);
    }

    // /**
    //  * @return Workbook[] Returns an array of Workbook objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Workbook
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
