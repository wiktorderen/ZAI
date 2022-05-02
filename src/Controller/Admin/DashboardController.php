<?php

namespace App\Controller\Admin;

use App\Controller\Admin\SuperAdminCrudController;
use App\Entity\Distributor;
use App\Entity\Product;
use App\Entity\SuperAdmin;
use App\Entity\Order;
use App\Entity\Trader;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Factory\MenuFactory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     * return Response
     */
    public function index(): Response
    {
        return parent::index();

        //$routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        //return $this->redirect($routeBuilder->setController(SuperAdminCrudController::class)->generateUrl());

        //$adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        //return $this->redirect($adminUrlGenerator->setController(OrderCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ZAI');
    }

    public function configureMenuItems(): iterable
    {
        return[
         MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
         MenuItem::linkToCrud('dashboard.admin', 'fas fa-list', SuperAdmin::class),
         MenuItem::linkToCrud('dashboard.distributor', 'fas fa-list', Distributor::class),
         MenuItem::linkToCrud('dashboard.trader', 'fas fa-list', Trader::class),
         MenuItem::linkToCrud('dashboard.order', 'fas fa-list', Order::class),
         MenuItem::linkToCrud('dashboard.admin', 'fas fa-list', Product::class),
        ];
    }
}
