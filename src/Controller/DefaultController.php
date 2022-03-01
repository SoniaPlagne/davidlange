<?php

namespace App\Controller;

use App\Entity\Video;
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
    public function listeEmplois(): Response
    {
        $url1 = $this->generateUrl('emploi', ['id' =>1]);
        $url2 = $this->generateUrl('emploi', ['id' =>2]);
        $url3 = $this->generateUrl('emploi', ['id' =>3]);

        $emplois = [
            [
                'titre' => 'Emploi n°1',
                'url' => $url1
            ],
            [
                'titre' => 'Emploi n°2',
                'url' => $url2
            ],
            [
                'titre' => 'Emploi n°3',
                'url' => $url3
            ],

        ];
        
        return $this->render('default/emploi.html.twig', [
            'emplois' =>$emplois
        ]);
    }
    
    /**
     * @Route("/emploi/{id}", name="vue_emploi", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function vueEmploi($id)
    {

        return $this->render('default/vueEmploi.html.twig', [
            'id' =>$id
        ]);
    }


    /**
     * @Route("/actualites", name="liste_actualites", methods={"GET"})
     */
    public function listeActualites(): Response
    {
        $url1 = $this->generateUrl('vue_actualite', ['id' =>1]);
        $url2 = $this->generateUrl('vue_actualite', ['id' =>2]);
        $url3 = $this->generateUrl('vue_actualite', ['id' =>3]);
        
        return $this->render('default/actu.html.twig', [
            'url1' =>$url1,
            'url2' =>$url2,
            'url3' =>$url3,
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
