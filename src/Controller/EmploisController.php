<?php

namespace App\Controller;

use App\Entity\Emploi;
use App\Repository\EmploiRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmploisController extends AbstractController
{
    /**
     * @Route("/emploi", name="liste_emplois",methods={"GET"})
     */
    public function listeEmplois(EmploiRepository $emploiRepository): Response
    {
        $emplois = $emploiRepository->findAll();
        
        
        return $this->render('emplois/index.html.twig', [
            'emplois' =>$emplois
        ]);
    }
    
    /**
     * @Route("/emploi/{id}", name="vue_emploi", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function vueEmploi(Emploi $emploi)
    {


        return $this->render('emplois/vueEmploi.html.twig', [
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

}
