<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Migrations\Query\Query;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }


    public function findBookedwithquerybuilder(int $user_id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT d, c
            FROM App\Entity\Book d
            INNER JOIN d.Bookeds c
            WHERE d.user = :user_id'
        )->setParameter('user_id', $user_id);

        return $query->getResult();
    }


    public function findAllWithQB(int $user_id)
    {
        return $this->createQueryBuilder('e')
            ->where('e.user = :user')
            ->setParameter('user', $user_id)
            ->getQuery()
            ->getResult();
    }

    public function findAllWithISBN(int $isbn)
    {
        return $this->createQueryBuilder('e')
            ->where('e.isbn = :isbn')
            ->setParameter('isbn', $isbn)
            ->getQuery()
            ->getResult();
    }

    public function findAllWithuser(int $user)
    {
        return $this->createQueryBuilder('e')
            ->where('e.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    public function findAllwithcategories(int $categories)
    {
        return $this->createQueryBuilder('e')
            ->where('e.categories = :categories')
            ->setParameter('categories', $categories)
            ->getQuery()
            ->getResult();
    }


 




    // /**
    //  * @return Book[] Returns an array of Book objects
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
    public function findOneBySomeField($value): ?Book
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
