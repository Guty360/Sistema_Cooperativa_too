<?php

namespace App\Controller;
/*Librerias de prueba*/ 
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
/*Librerias de prueba*/ 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @Route("/prueba/envio", name="datos")
 */

class RegistrationController extends AbstractController
{
    /**
     * @Route("/read", name="index2")
    */

    public function index(UserPasswordHasherInterface $passwordHasher)
    {
        $user = new User(); 
        $plaintextPassword = $user->getPassword();

        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword  
        );

        $user->setPassword($hashedPassword);     
    }



}
