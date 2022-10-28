<?php

namespace App\Repository;

use App\Entity\UbicacionGeografica;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UbicacionGeografica>
 *
 * @method UbicacionGeografica|null find($id, $lockMode = null, $lockVersion = null)
 * @method UbicacionGeografica|null findOneBy(array $criteria, array $orderBy = null)
 * @method UbicacionGeografica[]    findAll()
 * @method UbicacionGeografica[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UbicacionGeograficaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UbicacionGeografica::class);
    }

    public function save(UbicacionGeografica $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UbicacionGeografica $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return UbicacionGeografica[] Returns an array of UbicacionGeografica objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UbicacionGeografica
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
