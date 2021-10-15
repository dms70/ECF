<?php

namespace App\Controller\Admin;
use App\Entity\Book;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\DateTime;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BookCrudController extends AbstractCrudController
{


public static function getEntityFqcn(): string
    {
        return Book::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('title', null),
            TextField::new('imageFile')->setFormType(VichImageType::class)->OnlyWhenCreating(),
            ImageField::new('image')->setBasePath('/uploads/couverture')->OnlyOnIndex(),
            DateTimeField::new('publishdate', null),
            TextareaField::new('description'),
            TextField::new('author'),
            IntegerField::new('copy'),
            IntegerField::new('isbn'),
            AssociationField::new('categories'),
            TextField::new('genre'),
             
        
            
        ];
    }
 


}
