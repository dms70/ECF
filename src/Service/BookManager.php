<?php
namespace App\Service;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\ObjectManager;
use Symfony\Component\HttpFoundation\Request;




class BookManager extends AbstractController
{


    public function searchbookreserved($data)
    {

        $isbn = $data['Recherche'];
        dump($data);
        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->findOneByisbn($isbn);
        dump($isbn);

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
        $bookbyIsbn = $repository->findAllWithISBN(isbn : $isbn);
  
        return $isbn;
    }




    public function removereservation(int $isbn): void
    {
        dump($isbn);
        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->findOneByisbn($isbn);
        dump($book);
        $book->setReserved(false);
        $book->setBookeddate(NULL);
        $book->setBookeds(NULL);
        $book->setUser(NULL);

        $entityManager->persist($book);
    
        $entityManager->flush();
        dump($isbn);

    }

    public function removeborrowed(int $isbn): void
    {
        dump($isbn);
        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->findOneByisbn($isbn);
        dump($book);
        $book->setBorrowed(false);
        $book->setBookeddate(NULL);
        $book->setBookeds(NULL);
        $book->setUser(NULL);

        $entityManager->persist($book);
    
        $entityManager->flush();
        dump($isbn);

    }

    public function addreservation(int $isbn): void
    {

        $user = $this->getUser();
        $userId = $user->getId();

        dump($userId);

        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->findOneByisbn($isbn);
        dump($book);
        $book->setReserved(true);
        $date = new \DateTime('@'.strtotime('now'));
        $book->setBookeddate ($date);
        //$book->setBookeds(NULL);
        $book->setUser( $user);

        $entityManager->persist($book);
    
        $entityManager->flush();
        dump($isbn);

    }





}