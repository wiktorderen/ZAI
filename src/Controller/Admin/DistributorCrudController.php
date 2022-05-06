<?php

namespace App\Controller\Admin;

use App\Entity\Distributor;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;

class DistributorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Distributor::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('email'),
            TextField::new('name'),
        ];
    }


    public function configureActions(Actions $actions): Actions
    {
        $editDistributor = Action::new('distributor', 'Edit', 'fa fa-file-admin')->linkToCrudAction('edit');

        return $actions
            ->add(Crud::PAGE_DETAIL, $editDistributor)
            ->setPermission(Label::class, 'ROLE_ADMIN')
            ->setPermission(Action::EDIT, 'ROLE_ADMIN')
            ->setPermission(Action::DELETE, 'ROLE_ADMIN')
            ->setPermission(Action::NEW, 'ROLE_ADMIN');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return Crud::new()->setEntityLabelInSingular('Distributor')->setEntityLabelInPlural('Distributors')->setEntityPermission('ROLE_USER');
    }
}
