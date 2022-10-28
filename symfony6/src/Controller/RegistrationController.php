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

/**
 * @Route("/prueba/envio", name="datos")
 */

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

    /**
     * @Route("/read", name="index2")
     */
    public function index(Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $plaintextPassword = '1000';
        $email = 'jmge@gmail.com';

        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );

        $user->setPassword($hashedPassword);
        $user->setRoles(['ROLE_USER']);
        $user->setEmail($email);
        $this->em->persist($user);
        $this->em->flush();


        return $this->render('index/index.html.twig', []);
    }
}
