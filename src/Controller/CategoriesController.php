<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Book;
use App\Form\Searchbook;
use App\Service\BookManager;

class CategoriesController extends AbstractController
{
    #[Route('/categories', name: 'categories')]
    public function categories(PaginatorInterface $paginator,
     request $request,BookRepository $BookRepository): Response
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
    public function categoriesRomans(PaginatorInterface $paginator, request $request,
    BookRepository $BookRepository,BookManager $BookManager): Response
    {
       

        $genre = 'genre';

        $form = $this->createForm(SearchBook::class);

        $form->handleRequest($request);
        $data = $form->getData();
        
        if ($form->isSubmitted() && $form->isValid()) {
            $BookManager->searchbookpertitle($data);
            $genre = $data['Recherche'];
        }     

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
        /** @var ActivityRepository */
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
        //$bookbyUserMethode = $repository->findAllWithtitle();




        $user = $this->getUser();

        $data =  $BookRepository->findAllwithcategories(categories : 1);

        $Books = $paginator->paginate(
            $data, $request->query->getInt('page',1),6    
        );
      
        return $this->render('categories/romans.html.twig', [
                
                'Bookstitle' => $repository->findAllWithGenreperCat(genre : $genre, categories : 1),'User' => $user,
                'controller_name' => 'CategoriesController','form' => $form->createView(),
                'Books' => $Books,'User' => $user,
               
        ]);
       
    }






    #[Route('/categoriesBD', name: 'categoriesBD')]
    public function categoriesBD(PaginatorInterface $paginator, request $request,BookRepository 
    $BookRepository,BookManager $BookManager): Response
    {
       

        $genre = 'genre';

        $form = $this->createForm(SearchBook::class);

        $form->handleRequest($request);
        $data = $form->getData();
        
        if ($form->isSubmitted() && $form->isValid()) {
            $BookManager->searchbookpertitle($data);
            $genre = $data['Recherche'];
        }     

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
        /** @var ActivityRepository */
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
        //$bookbyUserMethode = $repository->findAllWithtitle();




        $user = $this->getUser();

        $data =  $BookRepository->findAllwithcategories(categories : 2);


        $Books = $paginator->paginate(
            $data, $request->query->getInt('page',1),6    
        );
      
        return $this->render('categories/bd.html.twig', [
                
                'Bookstitle' => $repository->findAllWithGenreperCat(genre : $genre, categories : 2),'User' => $user,
                'controller_name' => 'CategoriesController','form' => $form->createView(),
                'Books' => $Books,'User' => $user,
               
        ]);
       
    }
    #[Route('/categoriesEnfants', name: 'categoriesEnfants')]
    public function categoriesEnfants(PaginatorInterface $paginator, 
    request $request,BookRepository $BookRepository,BookManager $BookManager): Response
    {
       

        $genre = 'genre';

        $form = $this->createForm(SearchBook::class);

        $form->handleRequest($request);
        $data = $form->getData();
        
        if ($form->isSubmitted() && $form->isValid()) {
            $BookManager->searchbookpertitle($data);
            $title = $data['Recherche'];
        }     

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
        /** @var ActivityRepository */
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
        //$bookbyUserMethode = $repository->findAllWithtitle();




        $user = $this->getUser();

        $data =  $BookRepository->findAllwithcategories(categories : 3);


        $Books = $paginator->paginate(
            $data, $request->query->getInt('page',1),6    
        );
      
        return $this->render('categories/enfants.html.twig', [
                
                'Bookstitle' => $repository->findAllWithGenreperCat(genre : $genre, categories : 3),'User' => $user,
                'controller_name' => 'CategoriesController','form' => $form->createView(),
                'Books' => $Books,'User' => $user,
               
        ]);
       
    }
    
    #[Route('/categoriesDocumentaires', name: 'categoriesDocumentaires')]
    public function categoriesDocumentaires(PaginatorInterface $paginator, 
    request $request,BookRepository $BookRepository,BookManager $BookManager): Response
    {
       

        $genre = 'genre';

        $form = $this->createForm(SearchBook::class);

        $form->handleRequest($request);
        $data = $form->getData();
        
        if ($form->isSubmitted() && $form->isValid()) {
            $BookManager->searchbookpertitle($data);
            $genre = $data['Recherche'];
        }     

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
        /** @var ActivityRepository */
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
        //$bookbyUserMethode = $repository->findAllWithtitle();




        $user = $this->getUser();

        $data =  $BookRepository->findAllwithcategories(categories : 4);


        $Books = $paginator->paginate(
            $data, $request->query->getInt('page',1),6    
        );
      
        return $this->render('categories/documentaires.html.twig', [
                
                'Bookstitle' => $repository->findAllWithGenreperCat(genre : $genre, categories : 4),'User' => $user,
                'controller_name' => 'CategoriesController','form' => $form->createView(),
                'Books' => $Books,'User' => $user,
               
        ]);
       
    }
    
}

