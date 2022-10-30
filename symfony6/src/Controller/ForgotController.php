<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Persona;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\JsonResponse;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ForgotController extends AbstractController
{
    #[Route('/forgot', name: 'app_forgot')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'ForgotController',
        ]);
    }

    /**
     * @Route("/olvida", name="olvida_pass")
     */
    public function olvida(Request $request, UserRepository $userRepository){
        $correo = $request->get('correo', null);
        $userAsArray = [];
        $users = $userRepository->findAll();
        foreach ($users as $user) {
            if($correo == $user->getEmail()){
                $userAsArray[] = [
                    'id' => $user->getId(),
                    'correo' => $user->getEmail()
                ];
            }
        };
        if(empty($userAsArray)){
            $response = new JsonResponse();
            $response->setData([
                'encontrado' => false,
                'data' => "no se encuenta"
            ]);
            return $response;
        }else{
            $response = new JsonResponse();
            $response->setData([
                'encontrado' => true,
                'data' => $userAsArray
            ]);
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            //Se crea la generacion aleatoria de codigo de acceso
            $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $cad = "";
            for($i =0; $i<10; $i++){
                $cad .= substr($charset, rand(0, 61), 1);
            }
            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();              
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'or030500@gmail.com';
                $mail->Password   = 'qltrdggzrspiymxc';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                //Recipients
                $mail->setFrom('or030500@gmail.com', 'Bot de codigos.');
                $mail->addAddress($correo, 'Asociado');
                $mail->addCC($correo);
                
                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Codigo de acceso a su cuenta.';
                $mail->Body    = $cad;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent.';

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            return $response;
        }
        
    }

}
