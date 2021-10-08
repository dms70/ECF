<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\Searchbook;
use Symfony\Component\HttpFoundation\Request;
use App\Service\BookManager;
use App\Repository\BookRepository;
use App\Entity\Book;

class ReturnerdBookController extends AbstractController
{
    #[Route('/returnerdbook', name: 'returnerd_book')]
    
    public function index(BookRepository $BookRepository,BookManager $BookManager,Request $request): Response
    {

        $isbn = '999999999999999';

        $form = $this->createForm(SearchBook::class);

        $form->handleRequest($request);
        $data = $form->getData();
        
        if ($form->isSubmitted() && $form->isValid()) {
            $BookManager->searchbookreserved($data);
            $isbn = $data['Recherche'];
        }     

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
        $bookbyUserMethode = $repository->findAllBorrowed();

       
        return $this->render('returnerd_book/index.html.twig', [
            'AllBooks' =>$bookbyUserMethode = $repository->findAllBorrowed(),
            'Books' =>$bookbyIsbn = $repository->findAllWithISBN(isbn : $isbn),
            'controller_name' => 'ReturnerdBookController','form' => $form->createView()
        ]);



    }


    public function searchreturner(Request $request) : response
{
    //$form = $this->createForm(ContactType::class);
    //$form->handleRequest($request);
    $form->handleRequest($request);
    $data = $form->getData();
    dump($data);

    return new Response(content : '<body></body>');
}



}
