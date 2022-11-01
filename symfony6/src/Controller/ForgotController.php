<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForgotController extends AbstractController
{

    #[Route('/forgot', name: 'app_forgot')]
    public function index(): Response
    {
        // $this->denyAccessUnlessGranted('ROLE_USER', null, 'User tried to access a page without having ROLE_ADMIN');
        return $this->render('index/index.html.twig', [
            'controller_name' => 'ForgotController',
        ]);
    }


    
}
