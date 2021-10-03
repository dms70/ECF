<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;

class CatalogueController extends AbstractController
{
    #[Route('/catalogue', name: 'catalogue')]
    public function catalogue(BookRepository $BookRepository): Response
    {
        {
            return $this->render('catalogue/catalogue.html.twig', [
                'Books' => $BookRepository->findall(),
            ]);
        }
    }
}
