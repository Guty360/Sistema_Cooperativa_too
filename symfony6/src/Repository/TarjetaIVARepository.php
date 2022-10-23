<?php

namespace App\Repository;

use App\Entity\TarjetaIVA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TarjetaIVA>
 *
 * @method TarjetaIVA|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarjetaIVA|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarjetaIVA[]    findAll()
 * @method TarjetaIVA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarjetaIVARepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TarjetaIVA::class);
    }

    public function save(TarjetaIVA $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TarjetaIVA $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TarjetaIVA[] Returns an array of TarjetaIVA objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TarjetaIVA
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
