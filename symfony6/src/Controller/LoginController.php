<?php

namespace App\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//-------Nuevas Librerias
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
//-------Fin de las nuevas librerias

class LoginController extends AbstractController
{
    // /**
    //  * @Route("/verificado", name="verificadoConfirmado")
    //  */
    #[Route('/login', name: 'app_login')]   
    public function index(#[CurrentUser] ?User $user, Request $request): Response
    {
        $datosxd = json_decode($request->getContent());
        
        if (null === $user) {
            return $this->render('index/index.html.twig', [
                'message' => 'missing credentials',
            ]/*, Response::HTTP_UNAUTHORIZED*/);
        }

        $token = $datosxd->{'password'}; // somehow create an API token for $user
        $token1 = $datosxd->{'email'};

        return $this->render('index/index.html.twig', [
        'user'  => $user->getUserIdentifier(),
        'token' => $token,
        'token1'=>$token1,
        ]);
    }

    #[Route('/logout', name: 'app_logout', methods: ['GET'])]
    public function logout()
    {   
         // controller can be blank: it will never be called!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }

}
