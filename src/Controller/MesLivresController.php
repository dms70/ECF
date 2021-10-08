<?php

namespace App\Controller;
use App\Service\BookManager;
use App\Entity\Book;
use App\Repository\BookedRepository;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class MesLivresController extends AbstractController
{


    #[Route('/meslivres', name: 'mes_livres')]

    public function meslivres(BookedRepository $BookedRepository, BookRepository $BookRepository): Response
    {
        $user = $this->getUser();
        $userId = $user->getId();

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
        $bookbyUserMethode = $repository->findAllWithQB(user_id : $userId);

        return $this->render('mes_livres/meslivres.html.twig', [
           'Books' =>$bookbyUserMethode = $repository->findAllWithQB(user_id : $userId),
        ]);

    }
}


