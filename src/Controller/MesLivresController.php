<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MesLivresController extends AbstractController
{
    #[Route('/mes/livres', name: 'mes_livres')]
    public function index(): Response
    {
        return $this->render('mes_livres/index.html.twig', [
            'controller_name' => 'MesLivresController',
        ]);
    }
}
