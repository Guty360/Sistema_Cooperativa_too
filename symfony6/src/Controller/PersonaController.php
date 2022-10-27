<?php

namespace App\Controller;

use App\Repository\PersonaRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Persona;
use Doctrine\Persistence\ManagerRegistry;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonaController extends AbstractController
{
    /**
     * @Route("/lista", name="lista_personas")
     */
    public function lista(Request $request, PersonaRepository $personaRepository){

        $personas = $personaRepository->findAll();
        $personaAsArray = [];
        foreach ($personas as $persona) {
            $personaAsArray[] = [
                'id' => $persona->getId(),
                'nombre' => $persona->getPrimerNombre(),
                'correo' => $persona->getCorreo()
            ];
        };
        
        $response = new JsonResponse();
        $response->setData([
            'sucess' => true,
            'data' => $personaAsArray
        ]);
        return $response;
    }
    /**
     * @Route("/encuentra", name="encuentra_personas")
     */
    public function encuentra(Request $request, PersonaRepository $personaRepository){
        $correo = $request->get('correo', null);
        $personas = $personaRepository->findAll();
        foreach ($personas as $persona) {
            if($correo == $persona->getCorreo()){
                $personaAsArray[] = [
                    'id' => $persona->getId(),
                    'nombre' => $persona->getPrimerNombre(),
                    'correo' => $persona->getCorreo()
                ];
            }
        };
        $response = new JsonResponse();
        $response->setData([
            'sucess' => true,
            'data' => $personaAsArray
        ]);
        return $response;
    }
}