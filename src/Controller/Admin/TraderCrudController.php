<?php

namespace App\Controller\Admin;

use App\Entity\Trader;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;

class TraderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Trader::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('email'),
            TextField::new('first_name'),
            TextField::new('last_name'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return Crud::new()->setEntityLabelInSingular('Trader')->setEntityLabelInPlural('Traders')->setEntityPermission('ROLE_USER');
    }

    public function configureActions(Actions $actions): Actions
    {
        $editTrader = Action::new('trader', 'Edit', 'fa fa-file-admin')->linkToCrudAction('edit');

        return $actions
            ->add(Crud::PAGE_DETAIL, $editTrader)
            ->setPermission(Action::NEW, 'ROLE_ADMIN')
            ->setPermission(Action::EDIT, 'ROLE_ADMIN')
            ->setPermission(Action::DELETE, 'ROLE_ADMIN');
    }

}
