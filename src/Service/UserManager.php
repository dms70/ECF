<?php
namespace App\Service;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;





class UserManager extends AbstractController
{

   public function searchemail($data)
    {

        $email = $data['Recherche'];

        /** @var ActivityRepository */
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->findOneByemail($email);
   
        /** @var ActivityRepository */
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(User::class);
        $userbyEmail = $repository->findOneByemail(email : $email);
  
        return $email;
    }


    public function searchisverified($data) 
    {

        $email = $data['Recherche'];

        /** @var ActivityRepository */
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->findOneByemail($email);

        /** @var ActivityRepository */
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(User::class);
        $userbyEmail = $repository->findOneByemail(email : $email);
  
        return $email;
    }

   
    public function changestatusregistered(int $id) : void
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()
        ->getRepository(user::class)
        ->find($id);



        //$user = $userRepository->findByid($id);

        $statusIsVerified = $user ->isVerified();

        if ( $statusIsVerified == true ) 
        {
            $result = false;
            
        };

        if ( $statusIsVerified == false ) 
        {
            $result = true;
            
        };


        $user->setIsVerified($result);
  
        $entityManager->persist($user);

        $entityManager->flush();

         

    }




}