<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use App\Entity\Emploi;
use App\Entity\Video;
use App\Entity\User;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Controller\DashboardControllerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('David Lange')
            ->disableUrlSignatures();
    }

    public function configureMenuItems(): iterable
    {

        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Actualités', 'fas fa-newspaper', Actualite::class);
        yield MenuItem::linkToCrud('Emplois','fas fa-briefcase', Emploi::class);
        yield MenuItem::linkToCrud('Videos', 'fas fa-video', Video::class);
        yield MenuItem::linkToCrud('Clients', 'fas fa-users', User::class);
       # yield MenuItem::linkToLogout('Déconnexion', 'fas fa-sign-out-alt');

    }
        
        
        
}
