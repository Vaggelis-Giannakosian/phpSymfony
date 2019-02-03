<?php

namespace App\Repository;

use App\Entity\Pelatis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Pelatis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pelatis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pelatis[]    findAll()
 * @method Pelatis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PelatisRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pelatis::class);
    }

    // /**
    //  * @return Pelatis[] Returns an array of Pelatis objects
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
    public function findOneBySomeField($value): ?Pelatis
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
