<?php

namespace App\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//-------Nuevas Librerias
use App\Entity\User;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
//-------Fin de las nuevas librerias

//  /**
//   * @Route("/login/datos", name="applogin")
//   */
class LoginController extends AbstractController
{
    // /**
    //  * @Route("/verificado", name="verificadoConfirmado")
    //  */
    #[Route('/login', name: 'app_login')]
    public function index(#[CurrentUser] ?User $user): Response
    {
        if (null === $user) {
            return $this->render('index/index.html.twig', [
                'message' => 'missing credentials',
            ]/*, Response::HTTP_UNAUTHORIZED*/);
        }

        $token = $user.$_GET($user->getPassword()); // somehow create an API token for $user
        

        return $this->render('index/index.html.twig', [
        'user'  => $user->getUserIdentifier(),
        'token' => $token,
        ]);
    }

}
