<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/datos/personas", name="datos")
 */

class TraerDatosDBController extends AbstractController
{
    // es posible omitir el entityManager
    private $entityManager;
    private $UserRepository;

    public function __construct(EntityManagerInterface $entityManager, UserRepository $UserRepository)
    {
        $this->entityManager = $entityManager;
        $this->UserRepository = $UserRepository;
    }

    /**
     * @Route("/read", name="index")
    */

    public function index()
    {
        $todos = $this->UserRepository->findAll();

        $array = [];
        foreach ($todos as $todo) {
            $array[] = $todo->toArray();
        }
        return $this->json($array); 
    }

     /**
      * @Route("/prueba", name="create")
      * @param Request $request
      * @return Response
     */

    public function create(Request $request)
    {
        // Lo convierte en un objeto PHP
        $datos = json_decode($request->getContent());
        

        if(!$datos)
        {
           
        }else{
            $response = new Response();
            
            $response->setContent(json_encode([
                'data' => $datos,
            ]));
        }
        
        return $response->send();
    }

    // #[Route('/traer/datos/d/b/{id}', name: 'app_traer_datos_d_b')]
    // public function show(ManagerRegistry $doctrine, int $id): Response
    // {
    //     $personas = $doctrine->getRepository(Persona::class)->find($id);

    //     if (!$personas) {
    //         throw $this->createNotFoundException(
    //             'No se encontro nada, respecto a este id ingresado. '.$id
    //         );
    //     }

    //     return new Response('Recogiendo datos de la DB: '.$personas->getCorreo());
    // }
}
