<?php

namespace App\Controller;

use App\Entity\Persona;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


//-------------------NI se les ocurra tocar esto---------------------
class RegistrosController extends AbstractController
{
    private $em;
    /**
     * @param $em
     */
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }
    #[Route('/registros', name: 'app_registros')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/RegistrosController.php',
        ]);
    }

    #[Route('/registros/basedb', name:'app_registros_basedb')]
    public function indexado(Request $request): JsonResponse
    {
        $datox = json_decode($request->getContent());
        $persona = new Persona();

        $username = $datox->{'username'};
        $name = $datox->{'name'};
        $name2 = $datox->{'name2'};
        $apellido = $datox->{'lastName'};
        $apellido2 = $datox->{'lastName2'};
        $dateBirth = $datox->{'dateBirth'};
        $phone = $datox->{'phone'};

        if($username && $name && $apellido && $dateBirth && $phone){
            $persona->setCorreo($username);
            $persona->setPrimerNombre($name);
            $persona->setSegundoNombre($name2);
            $persona->setTercerNombre('');
            $persona->setPrimerApellido($apellido);
            $persona->setSegundoApellido($apellido2);
            $persona->setApellidoCasada('de fenandez');
            $persona->setCelular($phone);
            $persona->setEdad('45');
            $persona->setFechaNacimiento($dateBirth);
            $this->em->persist($persona);
            $this->em->flush();

            $response = new JsonResponse();
            return $response->send();
        }else{
            $response = new JsonResponse(JsonResponse::HTTP_NOT_FOUND);
            return $response->send();
        }
    }

        //-------------------------ESTE METODO SE UTILIZARA PARA INCRIPTAR LA CONTRASEÑA---------------------------
        #[Route('/registro/usuario/incriptado', name: 'app_registro_usuario', methods:['POST'])]
        public function registrar_usuarioIncriptado(Request $request, UserPasswordHasherInterface $passwordHasher): JsonResponse
        {
            $datos = json_decode($request->getContent());
            // //Haciendo el seteo del nuevo usuario, a la base de datos
            $user = new User();
            
            // if (null === $user) {
            //     return $this->render('index/index.html.twig', [
            //     ]);
            // }
            
            $plaintextPassword = $datos->{'password'};
            $username = $datos->{'username'};
            $hashedPassword = $passwordHasher->hashPassword($user,$plaintextPassword);
            
            if($username && $plaintextPassword){
                 //Metodos del seteo de la base de datos de la tabla(entidad user)
                $user->setPassword($hashedPassword);
                $user->setRoles(['ROLE_USER']);
                $user->setEmail($username);
                $this->em->persist($user);
                $this->em->flush();
    
                $response = new JsonResponse();
                return $response->send();
            }else{
                $response = new JsonResponse(JsonResponse::HTTP_NOT_FOUND);
                return $response->send();
             }
             }

}
