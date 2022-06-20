<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Repository\ActualiteRepository;
use Doctrine\ORM\EntityManagerInterface;
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
        
        return $this->render('actualites/index.html.twig', [
            'actualites' =>$actualites
        ]);
    }

    /**
     * @Route("/actualites/{id}", name="vue_actualite", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function vueActualite(Actualite $actualite)
    {

        return $this->render('actualites/vueActualite.html.twig', [
            'actualite' =>$actualite
        ]);
    }

    /**
     * @Route("/actualites/ajouter", name="ajoutActualite")
     */
    public function ajouterActualite(EntityManagerInterface $manager)
    {
        $actualite = new Actualite();

        $actualite->setTitre("Titre de l'actualité");
        $actualite->setContenu("Contenu de l'actualité");
        #$actualite->setImage("file");

        $manager->persist($actualite);
        $manager->flush();

        return $this->render('actualites/vueActualite.html.twig', [
            'actualite' =>$actualite
        ]);
    }

}
