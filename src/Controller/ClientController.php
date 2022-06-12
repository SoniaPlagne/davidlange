<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index(): Response
    {
        return $this->render('client/index.html.twig', 
        [
            'controller_name' => 'ClientController',
    
        ]);
    }

    /**
     * @Route("/videos_sav", name="videos_sav")
     */
    public function videos_sav(): Response
    {
        return $this->render('client/videos_sav.html.twig', 
        [
            'controller_name' => 'ClientController',
    
        ]);
    }
}
