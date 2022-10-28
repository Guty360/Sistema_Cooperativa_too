<?php

namespace App\Repository;

use App\Entity\ActividadEconomica;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ActividadEconomica>
 *
 * @method ActividadEconomica|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActividadEconomica|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActividadEconomica[]    findAll()
 * @method ActividadEconomica[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActividadEconomicaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActividadEconomica::class);
    }

    public function save(ActividadEconomica $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ActividadEconomica $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ActividadEconomica[] Returns an array of ActividadEconomica objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ActividadEconomica
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
