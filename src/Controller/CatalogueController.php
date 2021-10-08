<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;
use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;


class CatalogueController extends AbstractController
{
    #[Route('/catalogue', name: 'catalogue')]
    public function catalogue(PaginatorInterface $paginator, request $request,BookRepository $BookRepository): Response
    {
       
        $user = $this->getUser();

        $data =  $BookRepository->findall();

        $Books = $paginator->paginate(
            $data, $request->query->getInt('page',1),6    
        );
        {
            return $this->render('catalogue/catalogue.html.twig', [
                'Books' => $Books,'User' => $user
            ]);
        }
    }
}
