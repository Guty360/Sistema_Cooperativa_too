<?php

namespace App\Controller;

use App\Entity\Persona;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RegistroController extends AbstractController
{
    private $em;
    /**
     * @param $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/registro', name: 'app_registro')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'RegistroController',
        ]);
    }

    // // #[Route('/registro/usuario', name: 'app_registro_usuario', methods:['POST'])]
    // #[Route('/ruta/registro', name: 'app_registrarse', methods:['POST'])]

    // // /**
    // //  * @Route("/pruebas/usuario", name="ruta_registro")
    // //  */
    
    // public function registrar(Request $request): Response
    // {
        
    //     $datos = json_decode($request->getContent());
    //     $persona = new Persona();

    //     $username = $datos->{'username'};
    //     $name = $datos->{'name'};
    //     $lastname = $datos->{'lastname'};
    //     $dateBirth = $datos->{'dateBirth'};
    //     $phone = $datos->{'phone'};
    //     /*"username":"jmge5833@gmail.com",
    //     "password": "1212"
        
    //     "name":"Pedro alvares",
    //     "lastname": "fernando",
    //     "dateBirth": "10/25/2022",
    //     "phone": "74253645"*/

    //      if($username && $name && $lastname && $dateBirth && $phone){
    //     //Metodos del seteo de la base de datos de la tabla(entidad user)
    //         $persona->setCorreo($username);
    //         $persona->setPrimerNombre($name);
    //         $persona->setSegundoNombre('hoa');
    //         $persona->setTercerNombre('ho12a');
    //         $persona->setPrimerApellido($lastname);
    //         $persona->setSegundoApellido('Usr');
    //         $persona->setApellidoCasada('de fenandez');
    //         $persona->setCelular($phone);
    //         $persona->setEdad('45');
    //         $persona->setFechaNacimiento($dateBirth);
    //         $this->em->persist($persona);
    //         $this->em->flush();

    //         $response = new Response();
    //         return $response->send();
    //     }else{
    //         $response = new Response(Response::HTTP_NOT_FOUND);
    //         return $response->send();
    //      }

    //      /*
    //                 {
    //         "username":"sadas@gmai.com",
    //         "name":"Pedro alvares",
    //         "lastname": "fernando",
    //         "dateBirth": "10/25/2022",
    //         "phone": "74253645"
    //         }        
    //     */
    // }         

        //-------------------------ESTE METODO SE UTILIZARA PARA INCRIPTAR LA CONTRASEÑA---------------------------
    #[Route('/registro/usuario/incriptado', name: 'app_registro_usuario', methods:['POST'])]
    public function registrar_usuarioIncriptado(Request $request, UserPasswordHasherInterface $passwordHasher): Response
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

            $response = new Response();
            return $response->send();
        }else{
            $response = new Response(Response::HTTP_NOT_FOUND);
            return $response->send();
         }
         }       

}
