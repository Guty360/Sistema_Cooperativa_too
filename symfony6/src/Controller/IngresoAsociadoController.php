<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IngresoAsociadoController extends AbstractController
{
    #[Route('/ingreso-asociado', name: 'app_ingreso_asociado')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IngresoAsociadoController',
        ]);
    }
}
