<?php

namespace App\Controller;
use App\Service\BookManager;
use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\ObjectManager;
use Symfony\Component\HttpFoundation\Request;


class ManagereservedbookController extends AbstractController
{
  

#[Route('/removereservation/{isbn}', name: 'removereservation')]
public function removereservationbook(BookManager $BookManager, int $isbn)
{   
        dump($isbn);
        $BookManager->removereservation($isbn);
        
        return $this->redirectToRoute('mes_livres');
}

#[Route('/addreservation/{isbn}', name: 'addreservation')]
public function addreservation(BookManager $BookManager, int $isbn)
{   
        dump($isbn);
        $BookManager->addreservation($isbn);
        
        return $this->redirectToRoute('mes_livres');
}

#[Route('/confirmreserved/{isbn}', name: 'confirmreserved')]
public function confirmreserved(BookManager $BookManager, int $isbn)
{   
        dump($isbn);
        $BookManager->confirmreserved($isbn);
        
        return $this->redirectToRoute('mes_livres');
}


#[Route('/managereservedbook', name: 'managereservedbook')]

public function index(): Response
    {
        return $this->render('managereservedbook/index.html.twig', [
            'controller_name' => 'ManagereservedbookController',
        ]);
}



}
