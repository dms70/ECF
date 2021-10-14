<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use App\Repository\UserRepository;
use App\Service\UserManager;
use App\Form\Searchemail;
use App\Entity\User;

class RegisteredController extends AbstractController
{
    #[Route('/registered', name: 'registered')]

    //public function index(): Response
   // {
   //     return $this->render('registered/registered.html.twig', [
  //          'controller_name' => 'RegisteredController',
  //      ]);
   // }



    public function index(UserRepository $UserRepository,UserManager $UserManager,Request $request): Response
    {

        $email = 'empty';

        $form = $this->createForm(Searchemail::class);

        $form->handleRequest($request);
        $data = $form->getData();
        
        if ($form->isSubmitted() && $form->isValid()) {
            $UserManager->searchemail($data);
            $email = $data['Recherche'];
        }     
        /** @var ActivityRepository */
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(User::class);
       // $UserMethode = $repository->findAllUser();


        $UserMethode2 = $entityManager->getRepository(User::class);

       
        return $this->render('registered/registered.html.twig', [
            'AllUsers' => $repository->findAll(),
            'users' => $UserMethode2->findByEmail(email : $email),
            'controller_name' => 'RegisteredController','form' => $form->createView()
        ]);



    }






















}
