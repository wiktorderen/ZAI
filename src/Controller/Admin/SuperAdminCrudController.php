<?php

namespace App\Controller\Admin;

use App\Entity\SuperAdmin;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;


class SuperAdminCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SuperAdmin::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('email'),
            TextField::new('name'),
            TextField::new('last_name'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return Crud::new()->setEntityLabelInSingular('Admin')->setEntityLabelInPlural('Admins')->setEntityPermission('ROLE_ADMIN');
    }

    public function configureActions(Actions $actions): Actions
    {
        $editAdmin = Action::new('admin', 'Edit', 'fa fa-file-admin')->linkToCrudAction('edit');

        return $actions
            ->add(Crud::PAGE_DETAIL,$editAdmin)
            ->setPermission('admin', 'ROLE_ADMIN')
            ->setPermission(Action::EDIT, 'ROLE_ADMIN')
            ->disable(Action::DELETE)
            ->setPermission(Action::NEW, 'ROLE_ADMIN');
    }
}
