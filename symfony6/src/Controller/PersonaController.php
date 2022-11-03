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
//require 'vendor/phpmailer/phpmailer/src/Exception.php';
//require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
//require 'vendor/phpmailer/phpmailer/src/SMTP.php';

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
                //Solo se han colocado estos atributos para prueba, se pueden mandar a llamar a todos los atributos de la entidad
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
     * @Route("/olvidaaa", name="encuentra_personas")
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
                $mail->addAddress('lr18062@ues.edu.sv', 'Asociado');
                $mail->addCC('lr18062@ues.edu.sv');
                
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