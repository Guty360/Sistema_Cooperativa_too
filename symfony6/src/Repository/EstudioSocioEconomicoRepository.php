<?php

namespace App\Repository;

use App\Entity\EstudioSocioEconomico;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EstudioSocioEconomico>
 *
 * @method EstudioSocioEconomico|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstudioSocioEconomico|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstudioSocioEconomico[]    findAll()
 * @method EstudioSocioEconomico[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstudioSocioEconomicoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstudioSocioEconomico::class);
    }

    public function save(EstudioSocioEconomico $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EstudioSocioEconomico $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EstudioSocioEconomico[] Returns an array of EstudioSocioEconomico objects
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

//    public function findOneBySomeField($value): ?EstudioSocioEconomico
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
