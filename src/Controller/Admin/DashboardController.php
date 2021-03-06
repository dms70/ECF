<?php

namespace App\Controller\Admin;
use App\Entity\User;
use App\Entity\Booked;
use App\Entity\Book;
use App\Entity\Category;
use App\Entity\Genre;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('/admin/dashboard.html.twig');
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
        //yield MenuItem::linkToCrud('Utilisateur', 'fas fa-home', User::class);
        yield MenuItem::linkToCrud('user', 'fas fa-home', User::class);
        yield MenuItem::linkToCrud('Livres', 'fas fa-home', Book::class);
        yield MenuItem::linkToCrud('category', 'fas fa-home', Category::class);
        yield MenuItem::linkToCrud('Genre', 'fas fa-home', Genre::class);
    }
}
