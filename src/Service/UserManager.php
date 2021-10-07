<?php
namespace App\Service;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\ObjectManager;
use Symfony\Component\HttpFoundation\Request;




class UserManager extends AbstractController
{

   public function searchemail($data)
    {

        $email = $data['Recherche'];
        dump($data);
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->findOneByemail($email);
        dump($email);

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(User::class);
        $userbyEmail = $repository->findOneByemail(email : $email);
  
        return $email;
    }


    public function searchisverified($data)
    {

        $email = $data['Recherche'];
        dump($data);
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->findOneByemail($email);
        dump($email);

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(User::class);
        $userbyEmail = $repository->findOneByemail(email : $email);
  
        return $email;
    }



}