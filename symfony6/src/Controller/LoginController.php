<?php

namespace App\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// /**
//  * @Route("/login/datos", name="applogin")
//  */
class LoginController extends AbstractController
{

    // /**
    //  * @Route("/verificado", name="verificadoConfirmado")
    //  */
   #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one  
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();


         return $this->render('index/index.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
         ]);
    }

}
