<?php

namespace App\Controller;
/*Librerias de prueba*/

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
/*Librerias de prueba*/
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


//   @Route("/registrar", name:"datos");
 
#[Route('/registrar', name: 'app_registrar')]
class RegistrationController extends AbstractController
{
    private $em;
    /**
     * @param $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    // /**
    //  * @Route("/usuario", name="index2")
    //  */
    public function index(Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {
        //Haciendo el seteo del nuevo usuario, a la base de datos
        $user = new User();
        $plaintextPassword = '123456';
        $email = 'lr18062@ues.edu.sv';

        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );

        //Metodos del seteo de la base de datos de la tabla(entidad user)
        $user->setPassword($hashedPassword);
        $user->setRoles(['ROLE_USER']);
        $user->setEmail($email);
        $this->em->persist($user);
        $this->em->flush();


        return $this->render('index/index.html.twig', []);
    }
}
