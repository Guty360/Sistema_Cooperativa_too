<?php

namespace App\Repository;

use App\Entity\CuentaAhorro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CuentaAhorro>
 *
 * @method CuentaAhorro|null find($id, $lockMode = null, $lockVersion = null)
 * @method CuentaAhorro|null findOneBy(array $criteria, array $orderBy = null)
 * @method CuentaAhorro[]    findAll()
 * @method CuentaAhorro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CuentaAhorroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CuentaAhorro::class);
    }

    public function save(CuentaAhorro $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CuentaAhorro $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CuentaAhorro[] Returns an array of CuentaAhorro objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CuentaAhorro
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
