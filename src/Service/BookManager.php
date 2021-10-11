<?php
namespace App\Service;
use App\Entity\Book;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use  \app\Repository\UserRepository;
use  \app\Repository\BookedRepository;




class BookManager extends AbstractController
{

    public function searchbookpertitle($data)
    {

        $title = $data['Recherche'];
        dump($data);
        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->findOneBytitle($title);
        dump($title);

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
        $bookbyIsbn = $repository->findAllWithtitle(title : $title);
  
        return $title;
    }


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

        $user = $this->getUser();
        $userId = $user->getId();

        //dump($isbn);
        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->findOneByisbn($isbn);
        dump($book);
        $book->setReserved(false);
        $book->setBookeddate(NULL);
        $book->setBookeds(NULL);
        $book->setUser(NULL);

        $Bookborrowed= $user ->getBookborrowed();
        $Bookborrowed = --$Bookborrowed;
        $user->setBookborrowed($Bookborrowed);
        
        $entityManager->persist($book);
        $entityManager->persist($user);

        $entityManager->flush();
        //dump($isbn);

    }

    public function removeborrowed(int $isbn): void
    {
        //dump($isbn);        

        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->findOneByisbn($isbn);

        dump($book);
        $book->setBorrowed(false);
        $book->setBookeddate(NULL);
        $book->setBookeds(NULL);


        $id = $book->GetUser();
        $User = $entityManager->getRepository(User::class)->findOneByid($id);
        
        $user = $this->getUser();
        $Bookborrowed= $user ->getBookborrowed();
        $Bookborrowed = --$Bookborrowed;
        $user->setBookborrowed($Bookborrowed);

        $book->setUser(NULL);
        $user = $this->getUser();
        
        $entityManager->persist($book);
    
        $entityManager->flush();
        //dump($isbn);

    }

    public function addreservation(int $isbn): void
    {

        $user = $this->getUser();
        $userId = $user->getId();

        dump($userId);

        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->findOneByisbn($isbn);
        //dump($book);
        $book->setReserved(true);
        $date = new \DateTime('@'.strtotime('now'));
        $book->setBookeddate ($date);
        //$book->setBookeds(NULL);
        $book->setUser( $user);


        $Bookborrowed= $user ->getBookborrowed();
        $Bookborrowed = ++$Bookborrowed;
        $user->setBookborrowed($Bookborrowed);
            


        $entityManager->persist($book);
        $entityManager->persist($user);
    
        $entityManager->flush();
        dump($isbn);

    }


    public function confirmreserved(int $isbn): void
    {

        $user = $this->getUser();
        $userId = $user->getId();

        dump($userId);

        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->findOneByisbn($isbn);
        dump($book);
        $book->setReserved(false);
        $book->setBorrowed(true);
        $date = new \DateTime('@'.strtotime('now'));
        $book->setBookeddate ($date);
        $entityManager->persist($book);
    
        $entityManager->flush();
        dump($isbn);

    }




}