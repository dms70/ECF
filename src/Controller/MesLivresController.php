<?php

namespace App\Controller;
use App\Service\BookManager;
use App\Entity\Book;
use App\Repository\BookedRepository;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class MesLivresController extends AbstractController
{



    #[Route('/meslivres', name: 'mes_livres')]

    public function meslivres(BookedRepository $BookedRepository, BookRepository $BookRepository): Response
    {
        $user = $this->getUser();
        $userId = $user->getId();

        //$user_id= $BookedRepository->findBy(id:4);
        //dump($BookedRepository->findByuser('13'));
        //dump($BookRepository->findByuser(user_id:'13'));

        //$userId = $BookedRepository->findUserwithquerybuilder(user :'13');
        //dump($userId>getUser());

        //$manager = $this->getDoctrine()->getManager();
        //$results[0] = $manager->$BookedRepository->findUserByIdJoinedToBook(13);
        //dump($results);
       // dump($userId);
    
        //$test = $BookedRepository->findUserwithquerybuilder(user_id:$userId);


        //$bookbyUserMethode1 = $BookRepository->findBookedwithquerybuilder(user_id:$userId);


        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Book::class);
        $bookbyUserMethode2 = $repository->findAllWithQB(user_id : $userId);


        //$numberofbookeds = count($bookbyUserMethode2);
        //dump($bookbyUserMethode1);
        //dump($bookbyUserMethode2);
       // printf('livre %s', $bookbyUserMethode1[0]->getId());
        //printf('livre %s', $bookbyUserMethode2[1]->getAuthor());
       // dump($bookbyUserMethode2);
        //return new Response(sprintf('%s Livres Empruntes ou reserves', count($bookbyUserMethode2)));
 
    //   return new Response(content : '<body></body>');

        return $this->render('mes_livres/meslivres.html.twig', [
           'Books' =>$bookbyUserMethode2 = $repository->findAllWithQB(user_id : $userId),
        ]);

    }
}


