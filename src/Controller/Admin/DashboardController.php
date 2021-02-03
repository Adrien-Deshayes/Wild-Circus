<?php

namespace App\Controller\Admin;

use App\Entity\AboutUs;
use App\Entity\Contact;
use App\Entity\Galerie;
use App\Entity\Logo;
use App\Entity\Performance;
use App\Entity\Ticketing;
use App\Entity\User;
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
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Wild Circus');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Galerie', 'fas fa-newspaper', Galerie::class);
        yield MenuItem::linkToCrud('Perfomances', 'fas fa-list', Performance::class);
        yield MenuItem::linkToCrud('Billets', 'fas fa-comments', Ticketing::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-user', Contact::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-comments', User::class);
        yield MenuItem::linkToCrud('Logo', 'fas fa-comments', Logo::class);
        yield MenuItem::linkToCrud('A propos', 'fas fa-comments', AboutUs::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
