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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autolaod.php';

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
     * @Route("/olvida", name="encuentra_personas")
     */
    public function olvida(Request $request, PersonaRepository $personaRepository){
        $correo = $request->get('correo', null);
        $personaAsArray = [];
        $personas = $personaRepository->findAll();
        foreach ($personas as $persona) {
            if($correo == $persona->getCorreo() || $correo == $persona->getCelular()){
                $personaAsArray[] = [
                    'id' => $persona->getId(),
                    'nombre' => $persona->getPrimerNombre(),
                    'correo' => $persona->getCorreo()
                ];
            }
        };
        if(empty($personaAsArray)){
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
                'data' => $personaAsArray
            ]);
            //Create an instance; passing `true` enables exceptions
            /*$mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();              
                $mail->Host       = 'smtp-relay.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'or030500@gmail.com';
                $mail->Password   = 'qltrdggzrspiymxc';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 587;
                //Recipients
                $mail->setFrom('or030500@gmail.com', 'Te envio un correo');
                $mail->addAddress('sicosocial03@gmail.com', 'Recibo correo');
                $mail->addCC('sicosocial03@gmail.com');
                
                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Here is the subject';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }*/
            return $response;
        }
        
    }
}