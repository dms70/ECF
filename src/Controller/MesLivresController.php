<?php

namespace App\Controller;
use App\Entity\Book;
use App\Repository\BookedRepository;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class MesLivresController extends AbstractController
{

    #[Route('/meslivres', name: 'mes_livres')]

    public function meslivres(BookedRepository $BookedRepository, BookRepository $BookRepository): Response
    {
        $user = $this->getUser();
        $userId = $user->getId();

        /** @var ActivityRepository */
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);

        return $this->render('mes_livres/meslivres.html.twig', [
           'Books' => $repository->findAllWithQB(user_id : $userId),
        ]);

    }
}


