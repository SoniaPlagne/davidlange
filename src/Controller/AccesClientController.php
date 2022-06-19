<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AccesClientController extends AbstractController
{
    /**
     * @Route("/acces_client", name="acces_client")
     */

    public function index(AuthenticationUtils $authenticationUtils): Response
    {
         // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user         
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('acces_client/index.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    
    }
}
