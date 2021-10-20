<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\Searchbook;
use Symfony\Component\HttpFoundation\Request;
use App\Service\UserManager;
use App\Repository\UserRepository;
use App\Entity\User;

class ValidationReserverdBookController extends AbstractController
{
    #[Route('/validationbook', name: 'validationbook')]

    public function index(UserRepository $UserRepository,UserManager $UserManager,Request $request): Response
    {

        $email = 'nom.prenom@mediatheque.com';

        $form = $this->createForm(SearchBook::class);

        $form->handleRequest($request);
        $data = $form->getData();
        
        if ($form->isSubmitted() && $form->isValid()) {
            $UserManager->searchemail($data);
            $email = $data['Recherche'];
        }     
        /** @var ActivityRepository */
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(User::class);
       
        return $this->render('validationbook/validationbook.html.twig', [
            'Users' =>$UserByEmail = $repository->findByEmail(email : $email),
            'controller_name' => 'ValidationReserverdBookController','form' => $form->createView()
        ]);
    }

}
