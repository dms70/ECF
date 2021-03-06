<?php

namespace App\Repository;

use App\Entity\Booked;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Booked|null find($id, $lockMode = null, $lockVersion = null)
 * @method Booked|null findOneBy(array $criteria, array $orderBy = null)
 * @method Booked[]    findAll()
 * @method Booked[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Booked::class);
    }

    public function findUserwithquerybuilder(int $user_id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT d, c
            FROM App\Entity\Booked d
            INNER JOIN d.id c
            WHERE d. = :user_id'
        )->setParameter('user_id', $user_id);

        return $query->getResult();
    }




 

    // /**
    //  * @return Booked[] Returns an array of Booked objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Booked
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
