<?php

namespace App\Controller;

use app\controller\console;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
   #[Route('/login', name: 'app_login')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }

    public function datosLogin(string $correo, string $contraseña)
    {
       echo "el correo es" + $correo + "y la contraseña" + $contraseña;

    }

}
