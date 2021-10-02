<?php

namespace App\Controller;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MesLivresController extends AbstractController
{
    #[Route('/meslivres', name: 'mes_livres')]
    public function meslivres(BookRepository $BookRepository): Response
    {
        return $this->render('mes_livres/meslivres.html.twig', [
            'Books' => $BookRepository->findall(),
        ]);
    }
}


