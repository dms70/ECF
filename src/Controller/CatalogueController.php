<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\BookManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\BookRepository;
use App\Entity\Book;
use App\Form\Searchbook;

class CatalogueController extends AbstractController
{
    #[Route('/catalogue', name: 'catalogue')]
    public function catalogue(PaginatorInterface $paginator, request $request,BookRepository $BookRepository,BookManager $BookManager): Response
    {
       

        $title = 'title';

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

        $data =  $BookRepository->findall();

        $Books = $paginator->paginate(
            $data, $request->query->getInt('page',1),6    
        );
      
        return $this->render('catalogue/catalogue.html.twig', [
                
                'Bookstitle' => $repository->findAllWithtitle(title : $title),'User' => $user,
                'controller_name' => 'CatalogueController','form' => $form->createView(),
                'Books' => $Books,'User' => $user,
               
        ]);
       
    }
}
