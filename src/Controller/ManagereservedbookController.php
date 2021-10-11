<?php

namespace App\Controller;
use App\Service\BookManager;
use App\Service\UserManager;
use App\Entity\Book;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\ObjectManager;
use phpDocumentor\Reflection\Types\Boolean;
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

#[Route('/changestatusregistered/{id}', name: 'changestatusregistered')]
public function changestatusregistered(UserManager $UserManager, int $id)
{

   // dump($IsVerified);
    $UserManager->changestatusregistered($id);
    return $this->redirectToRoute('registered');


}
}