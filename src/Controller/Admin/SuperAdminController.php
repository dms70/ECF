<?php

namespace App\Controller\Admin;
use App\Entity\User;
use App\Entity\Booked;
use App\Entity\Book;
use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuperAdminController extends AbstractDashboardController
{
    /**
     * @Route("/superadmin", name="superadmin")
     */
    public function index(): Response
    {
        return $this->render('/superadmin/superadmindashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ecf');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-home', User::class)->setController(EmployeCrudController::class);
    
}

}