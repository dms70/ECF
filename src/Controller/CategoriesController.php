<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;


class CategoriesController extends AbstractController
{
    #[Route('/categories', name: 'categories')]
    public function categories(PaginatorInterface $paginator, request $request,BookRepository $BookRepository): Response
    {

        $data =  $BookRepository->findall();

        $Books = $paginator->paginate(
            $data, $request->query->getInt('page',1),6    
        );
        {
            return $this->render('categories/categories.html.twig', [
                'Books' => $Books,
            ]);
        }
    }


    #[Route('/categoriesRomans', name: 'categoriesRomans')]
    public function categoriesRomans(PaginatorInterface $paginator, request $request,BookRepository $BookRepository): Response
    {

        $data =  $BookRepository->findAllwithcategories(categories : 1);

        $Books = $paginator->paginate(
            $data, $request->query->getInt('page',1),6    
        );
        {
            return $this->render('categories/categories.html.twig', [
                'Books' => $Books, 
            ]);
        }
    }


    #[Route('/categoriesBD', name: 'categoriesBD')]
    public function categoriesBD(PaginatorInterface $paginator, request $request,BookRepository $BookRepository): Response
    {

        $data =  $BookRepository->findAllwithcategories(categories : 2);

        $Books = $paginator->paginate(
            $data, $request->query->getInt('page',1),6    
        );
        {
            return $this->render('categories/categories.html.twig', [
                'Books' => $Books, 
            ]);
        }
    }

    #[Route('/categoriesEnfants', name: 'categoriesEnfants')]
    public function categoriesEnfants(PaginatorInterface $paginator, request $request,BookRepository $BookRepository): Response
    {

        $data =  $BookRepository->findAllwithcategories(categories : 3);

        $Books = $paginator->paginate(
            $data, $request->query->getInt('page',1),6    
        );
        {
            return $this->render('categories/categories.html.twig', [
                'Books' => $Books,
            ]);
        }
    }
    
    #[Route('/categoriesDocumentaires', name: 'categoriesDocumentaires')]
    public function categoriesDocumentaires(PaginatorInterface $paginator, request $request,BookRepository $BookRepository): Response
    {

        $data =  $BookRepository->findAllwithcategories(categories : 4);

        $Books = $paginator->paginate(
            $data, $request->query->getInt('page',1),6    
        );
        {
            return $this->render('categories/categories.html.twig', [
                'Books' => $Books,
            ]);
        }
    }
    
    
}

