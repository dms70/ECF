<?php

namespace App\Controller\Admin;

use App\Entity\Booked;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BookedCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Booked::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
