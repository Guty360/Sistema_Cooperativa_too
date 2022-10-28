<?php

namespace App\Repository;

use App\Entity\CuentaAportacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CuentaAportacion>
 *
 * @method CuentaAportacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method CuentaAportacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method CuentaAportacion[]    findAll()
 * @method CuentaAportacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CuentaAportacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CuentaAportacion::class);
    }

    public function save(CuentaAportacion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CuentaAportacion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CuentaAportacion[] Returns an array of CuentaAportacion objects
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

//    public function findOneBySomeField($value): ?CuentaAportacion
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
