<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Migrations\Query\Query;
use phpDocumentor\Reflection\Types\Integer;

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


    public function findAllWithtitle(string $title)
    {
        return $this->createQueryBuilder('e')
            ->where('e.title = :title')
            ->setParameter('title', $title)
            ->getQuery()
            ->getResult();
    }

    public function findAllWithGenreperCat(string $genre, $categories)
    {
        return $this->createQueryBuilder('e')
            ->where('e.genre = :genre AND e.categories = :categories')
            ->setParameter('genre', $genre)
            ->setParameter('categories', $categories)
            ->getQuery()
            ->getResult();
    }
   
    public function findAllBorrowed()
    {
        return $this->createQueryBuilder('b')
            ->where('b.borrowed = :borrowed')
            ->setParameter('borrowed', true)
            ->orderBy('b.bookeddate', 'ASC')
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

    public function findAllwithcategoriesname(string $categoriesname)
    {
        return $this->createQueryBuilder('e')
            ->where('e.categoriesname = :categoriesname')
            ->setParameter('categoriesname', $categoriesname)
            ->getQuery()
            ->getResult();
    }
}
