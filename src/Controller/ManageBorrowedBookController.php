<?php

namespace App\Controller;
use App\Service\BookManager;
use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\ObjectManager;
use Symfony\Component\HttpFoundation\Request;


class ManageBorrowedBookController extends AbstractController
{
    #[Route('/removeborrowed/{isbn}', name: 'removeborrowed')]

    public function removeborrowedbook(BookManager $BookManager, int $isbn)
    {   
            dump($isbn);
            $BookManager->removeborrowed($isbn);
            
            return $this->redirectToRoute('returnerd_book');
    }
}


