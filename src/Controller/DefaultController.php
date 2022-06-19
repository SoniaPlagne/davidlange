<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Entity\Emploi;
use App\Entity\Video;
use App\Repository\ActualiteRepository;
use App\Repository\EmploiRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
    public function vueEmploi(Emploi $emploi)
    {


        return $this->render('default/vueEmploi.html.twig', [
            'emploi' =>$emploi
        ]);
    }
    
    /*
    /**
     * @Route("/emploi/ajouter", name="ajout_emploi")
     */

     public function ajouter(EntityManagerInterface $manager)
     {
         $form =$this->createFormBuilder()
         ->add('titre', TextType::class, [
             'label' => "Titre de l'emploi"
         ])
         ->add('descriptif', TextareaType::class, [
             'label' => "Descriptif du poste proposé"
         ])
         ->getForm();

         return $this->render('default/ajoutEmploi.html.twig',[
             'form' => $form->createView()

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

    /**
     * @Route("/videos", name="videos")
     */
    public function videos(): Response
    {
        return $this->render('default/videos.html.twig');
    }

   
    
    
    
}
