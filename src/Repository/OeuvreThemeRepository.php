<?php

namespace App\Repository;

use App\Entity\OeuvreTheme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OeuvreTheme>
 *
 * @method OeuvreTheme|null find($id, $lockMode = null, $lockVersion = null)
 * @method OeuvreTheme|null findOneBy(array $criteria, array $orderBy = null)
 * @method OeuvreTheme[]    findAll()
 * @method OeuvreTheme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OeuvreThemeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OeuvreTheme::class);
    }

    public function add(OeuvreTheme $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OeuvreTheme $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OeuvreTheme[] Returns an array of OeuvreTheme objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OeuvreTheme
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
