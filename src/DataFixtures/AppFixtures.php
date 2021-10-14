<?php

namespace App\DataFixtures;
use App\entity\user;
use App\entity\Category;
use App\entity\Genre;
use App\entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
//use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;



class AppFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;        
    }


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        $user = new User();

        $user->setEmail('david@marcais.online')
            ->setFirstname('david')
            ->setLastname('marcais')
            ->setAdress($faker->address())
            ->setRoles(["ROLE_ADMIN","ROLE_EMPLOYE","ROLE_HABITANT"])
            ->setBirthdate($faker->dateTimeBetween('-40 years','now', ))
            ->setIsVerified(true);
            $password = $this->passwordEncoder->HashPassword( $user, 'password' );
            $user->setPassword($password);
    
            $manager-> persist($user);
    
            $manager->flush();

        for ($i=0; $i<10; $i++) 
            { $user = new User();
            $user->setEmail($i.'habitant@marcais.online')
            ->setFirstname($faker->firstname())
            ->setLastname($faker->lastname())
            ->setAdress($faker->address())
            ->setRoles(["ROLE_HABITANT"])
            ->setBirthdate($faker->dateTimeBetween('-40 years','now', ))
            ->setIsVerified(false);
            

            $password = $this->passwordEncoder->HashPassword( $user, $i.'password' );
            $user->setPassword($password);
    
            $manager-> persist($user);
    
            $manager->flush();
            }


            for ($i=0; $i<5; $i++) 
            { $user = new User();
            $user->setEmail($i.'employe@marcais.online')
            ->setFirstname($faker->firstname())
            ->setLastname($faker->lastname())
            ->setAdress($faker->address())
            ->setRoles(["ROLE_EMPLOYE","ROLE_HABITANT"])
            ->setBirthdate($faker->dateTimeBetween('-40 years','now', ))
            ->setIsVerified(true);
            

            $password = $this->passwordEncoder->HashPassword( $user, $i.'password' );
            $user->setPassword($password);
    
            $manager-> persist($user);
    
            $manager->flush();
            }
        

            $value= ['ROMANS','BANDES DESSINEES','ALBUMS ENFANTS','DOCUMENTS'];
            
            for ($k=1; $k <= count($value); $k++)
               {$Category = [];
                $Category = new Category();
                $Category->setGenre($value[$k-1]);

                $manager-> persist($Category);
        
                $image=['ROMANS.JPG','BD.JPG','ALBUMSENFANTS.JPG','DOCUMENTS.JPG'];
               
                

                for ($j=1; $j<25; $j++) 
                { 
                $book = [];
                $book = new Book();

                $valuegenre= ['SCIENCE-FICTION','FANTASTIQUE','THILLER','HORREUR','NATURE','MUSIQUE','HISTOIRE'];
                $l = rand(0,6);
          
                $book->setTitle($faker->word(8))
                ->setpublishdate($faker->dateTimeBetween('-40 years','now', ))
                ->setDescription($faker->text())
                ->setAuthor($faker->firstname())
                ->Setcopy(1)
                ->setISBN($faker->isbn13)
                ->setImage($faker->image($dir = 'C:\xampp\apps\david\ECF\public\uploads\couverture', $width = 640, $height = 480))
                ->setCategories($Category)
                ->setGenre($valuegenre[$l]);
            
             
    
                $manager-> persist($book);
        
             
                }
        
               
            
            

                
    
                
                $manager->flush();
            }
            


            $valuegenre= ['SCIENCE-FICTION','FANTASTIQUE','THILLER','HORREUR','NATURE','MUSIQUE','HISTOIRE'];

            for ($i=1; $i<= count($value); $i++)
            {$Genre = [];
            $Genre = new Genre();
            $Genre->setGenrename($value[$i-1]);

            $manager-> persist($Genre);

            $manager->flush();
            }


       
    }
}



