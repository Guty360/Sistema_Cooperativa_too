<?php

namespace App\Controller;

use App\Entity\Persona;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TraerDatosDBController extends AbstractController
{
    #[Route('/traer/datos/d/b/{id}', name: 'app_traer_datos_d_b')]
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $personas = $doctrine->getRepository(Persona::class)->find($id);

        if (!$personas) {
            throw $this->createNotFoundException(
                'No se encontro nada, respecto a este id ingresado. '.$id
            );
        }

        return new Response('Recogiendo datos de la DB: '.$personas->getEdad());
    }
}
