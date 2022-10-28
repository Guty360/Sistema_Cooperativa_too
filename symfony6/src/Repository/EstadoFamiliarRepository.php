<?php

namespace App\Repository;

use App\Entity\EstadoFamiliar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EstadoFamiliar>
 *
 * @method EstadoFamiliar|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstadoFamiliar|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstadoFamiliar[]    findAll()
 * @method EstadoFamiliar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstadoFamiliarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstadoFamiliar::class);
    }

    public function save(EstadoFamiliar $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EstadoFamiliar $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EstadoFamiliar[] Returns an array of EstadoFamiliar objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EstadoFamiliar
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
