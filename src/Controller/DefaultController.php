<?php

namespace App\Controller;

use App\Entity\Emploi;
use App\Entity\Video;
use App\Repository\EmploiRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('default/home.html.twig');
    }

     /**
     * @Route("/savoir-faire", name="savoir")
     */
    public function savoir(): Response
    {
        return $this->render('default/savoir.html.twig');
    }

    /**
     * @Route("/histoire", name="histoire")
     */
    public function histoire(): Response
    {
        return $this->render('default/histoire.html.twig');
    }


     /**
     * @Route("/emploi", name="liste_emplois",methods={"GET"})
     */
    public function listeEmplois(EmploiRepository $emploiRepository): Response
    {
        $emplois = $emploiRepository->findAll();
        
        
        return $this->render('default/emploi.html.twig', [
            'emplois' =>$emplois
        ]);
    }
    
    /**
     * @Route("/emploi/{id}", name="vue_emploi", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function vueEmploi(EmploiRepository $emploiRepository, $id)
    {
        $emploi = $emploiRepository->find($id);


        return $this->render('default/vueEmploi.html.twig', [
            'emploi' =>$emploi
        ]);
    }
    /**
     * @Route("/emploi/ajouter", name="ajout_emploi")
     */
    public function ajouter(EntityManagerInterface $manager){
/* Symfony transforme la variable manager en objet EntityManagerInterface sur la route emploi/ajouter,ce sont les injections de dépendances. On injecte des classes à travers les paramètres de nos fonctions dans la partie Controller*/
        $emploi = new Emploi();
        $emploi->setTitre("Titre de l'emploi proposé");
        $emploi->setDescriptif("Ceci est le descriptif de l'emploi proposé");
        
/*le persist sert à créer la nouvelle entité (emploi qu'il ne connait pas encore), la créer en BDD et lui ajouter un id. La méthode flush sert à enregistrer le nouvel article en BDD.Flush est à utiliser à chaque fois qu'on veut injecter des données en BDD.*/
        $manager->persist($emploi);

        $manager->flush();





    }


    /**
     * @Route("/actualites", name="liste_actualites", methods={"GET"})
     */
    public function listeActualites(): Response
    {
        
        $actualites = [
            [
                'titre' => 'Actualité n°1',
                'id' => 1
            ],
            [
                'titre' => 'Actualité n°2',
                'id' => 2
            ],
            [
                'titre' => 'Actualité n°3',
                'id' => 3
            ],
            [
                'titre' => 'Actualité n°4',
                'id' => 4
            ],

        ];
        
        return $this->render('default/actualites.html.twig', [
            'actualites' =>$actualites
        ]);
    }

    /**
     * @Route("/actualites/{id}", name="vue_actualite", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function vueActualite($id)
    {

        return $this->render('default/vueActualite.html.twig', [
            'id' =>$id
        ]);
    }


     /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('default/contact.html.twig');
    }

     /**
     * @Route("/galerie", name="galerie")
     */
    public function galerie(): Response
    {
        return $this->render('default/galerie.html.twig');
    }

    /**
     * @Route("/mentions", name="mentions")
     */
    public function mentions(): Response
    {
        return $this->render('default/mentions.html.twig');
    }

     
    
}
