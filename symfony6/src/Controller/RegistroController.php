<?php

namespace App\Controller;
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

    #[Route('/registro/usuario', name: 'app_registro_usuario',methods:['POST'])]
    public function registrar(Request $request, UserPasswordHasherInterface $passwordHasher): Response{
        
        $datos = json_decode($request->getContent());
        //Haciendo el seteo del nuevo usuario, a la base de datos
        $user = new User();
        
        if (null === $user) {
            return $this->render('index/index.html.twig', [
            ]);
        }
        
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
