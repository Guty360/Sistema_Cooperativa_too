<?php

namespace App\Repository;

use App\Entity\CarnetMinoridad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarnetMinoridad>
 *
 * @method CarnetMinoridad|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarnetMinoridad|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarnetMinoridad[]    findAll()
 * @method CarnetMinoridad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarnetMinoridadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarnetMinoridad::class);
    }

    public function save(CarnetMinoridad $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CarnetMinoridad $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CarnetMinoridad[] Returns an array of CarnetMinoridad objects
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

//    public function findOneBySomeField($value): ?CarnetMinoridad
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
