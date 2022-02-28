<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideosController extends AbstractController
{
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
