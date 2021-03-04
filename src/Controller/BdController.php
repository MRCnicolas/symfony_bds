<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AuteurRepository;


class BdController extends AbstractController
{


/**
     * @Route("/bd", name="bd")
     */
    public function index(AuteurRepository $repo): Response
    {
        $auteurs = $repo->findall();

        return $this->render('bd/index.html.twig', [
            'controller_name' => 'Bdcontroller',
            'auteurs' => $auteurs
        ]);

        }
    /**
     * @Route("/", name="home")
     */
    public function home(AuteurRepository $repo): Response
    {
        $auteurs = $repo->findall();

        return $this->render('bd/home.html.twig', [
            'title' => 'Bienvenue sur le site des BD',
            'age' => 35
        ]);
    }

     /**
     * @Route("/bd/livre/{id}", name="bd_show")
     */
    public function show($id, AuteurRepository $repo) {

        $auteur = $repo->find($id);

        return $this->render('bd/show.html.twig', [
            'auteur' => $auteur
        ]);
    }
}
