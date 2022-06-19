<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Repository\ActualiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualitesController extends AbstractController
{
    
    /**
     * @Route("/actualites", name="liste_actualites", methods={"GET"})
     */
    public function listeActualites(ActualiteRepository $actualiteRepository): Response
    {
        
        $actualites = $actualiteRepository->findAll();
        
        return $this->render('default/actualites.html.twig', [
            'actualites' =>$actualites
        ]);
    }

    /**
     * @Route("/actualites/{id}", name="vue_actualite", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function vueActualite(Actualite $actualite)
    {

        return $this->render('default/vueActualite.html.twig', [
            'actualite' =>$actualite
        ]);
    }

}
