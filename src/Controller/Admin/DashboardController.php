<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Auteur;
use App\Entity\Editeur;
use App\Entity\Fournisseur;
use App\Entity\Genre;
use App\Entity\Produit;

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
            ->setTitle('Symfony Bds');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Accueil', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::section('Mes BD');
        yield MenuItem::linkToCrud('Produits', 'fas fa-tags', Produit::class);
        yield MenuItem::linkToCrud('Auteurs', 'fas fa-tags', Auteur::class);
        yield MenuItem::linkToCrud('Genres', 'fas fa-tags', Genre::class);
        yield MenuItem::linkToCrud('Editeurs', 'fas fa-tags', Editeur::class);
        yield MenuItem::linkToCrud('Fournisseurs', 'fas fa-tags', Fournisseur::class);
    }
}
