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
     * @Route("/histoire", name="histoire")
     */
    public function histoire(): Response
    {
        return $this->render('default/histoire.html.twig');
    }

     /**
     * @Route("/actualités", name="actualités")
     */
    public function actu(): Response
    {
        return $this->render('default/actu.html.twig');
    }

    

     /**
     * @Route("/emploi", name="emploi")
     */
    public function emploi(): Response
    {
        return $this->render('default/emploi.html.twig');
    }

     /**
     * @Route("/savoir-faire", name="savoir")
     */
    public function savoir(): Response
    {
        return $this->render('default/savoir.html.twig');
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
     * @Route("/videos", name="liste_videos", methods={"GET"})
     */
    public function listeVideos(): Response
    {
        $url1 = $this->generateUrl('vue_video', ['id'=>1]);
        return $this->render('default/videos.html.twig', [
            'url1' =>$url1,
        ]);
    }

    /**
     * @Route("/videos/{id)", name="vue_video", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function vue_video($id)
    {
        return $this->render('default/vue.html.twig', [
            'id'=>$id
        ]);
    }

    /**
     * @Route("/video/ajouter", name="ajout_video")
     */
    public function ajouter ()
    {
        $video = new Video;

    }


}
