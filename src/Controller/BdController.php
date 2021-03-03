<?php

namespace App\Controller;

use App\Repository\AuteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BdController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function home(AuteurRepository $repo): Response
    {
        $auteurs = $repo->findall();

        return $this->render('bd/home.html.twig', [
            'title' => 'Bienvenue sur le site des Bd',
            'auteurs' => $auteurs
        ]);
    }
}
