<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\Searchbook;
use Symfony\Component\HttpFoundation\Request;
use App\Service\BookManager;
use App\Repository\BookRepository;
use App\Entity\Book;

class ValidationReserverdBookController extends AbstractController
{
    #[Route('/validationbook', name: 'validationbook')]


    public function index(BookRepository $BookRepository,BookManager $BookManager,Request $request): Response
    {

        $iduser = '999999999999999';

        $form = $this->createForm(SearchBook::class);

        $form->handleRequest($request);
        $data = $form->getData();
        
        if ($form->isSubmitted() && $form->isValid()) {
            $BookManager->searchbookreserved($data);
            $iduser = $data['Recherche'];
        }     
        /** @var ActivityRepository */
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
   
        return $this->render('validationbook/validationbook.html.twig', [
            'Books' =>$bookbyiduser = $repository->findAllWithuser(user : $iduser),
            'controller_name' => 'ReturnerdBookController','form' => $form->createView()
        ]);
    }


}
