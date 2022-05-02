<?php

namespace App\Controller\Admin;

use App\Entity\Distributor;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DistributorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Distributor::class;
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
