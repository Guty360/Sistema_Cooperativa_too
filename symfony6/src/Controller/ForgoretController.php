<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

//-------------Nuevas librerias----------------
use Symfony\Component\HttpFoundation\Request;
use PHPMailer\PHPMailer\PHPMailer;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPMailer\PHPMailer\Exception;
use App\Entity\User;
//-------------Fin Nuevas librerias----------------

class ForgoretController extends AbstractController
{
    #[Route('/forgoret', name: 'app_forgoret')]
    public function index(Request $request, UserRepository $userRepository, EntityManagerInterface $em): JsonResponse
    {
        $datos = json_decode($request->getContent());
        $correo = $datos->{'email1'};
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
            //Comienzo de la generacion del correo
            $mail = new PHPMailer(true);
            //Se crea la generacion aleatoria de codigo de acceso
            $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $cad = "";
            for($i =0; $i<10; $i++){
                $cad .= substr($charset, rand(0, 61), 1);
            }try {
                //Configuracion del bot para enviar correo
                $mail->isSMTP();              
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'or030500@gmail.com';
                $mail->Password   = 'qltrdggzrspiymxc';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                //Quien envia el correo
                $mail->setFrom('or030500@gmail.com', 'Bot de codigos.');
                //Quien recibe el correo
                $mail->addAddress($correo, 'Asociado');
                $mail->addCC($correo);
                
                //Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Codigo de acceso a su cuenta.';
                $mail->Body    = $cad;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                //Envio del correo
                $mail->send();
                echo 'Message has been sent.';

                //Agregando la contrasena temporal en el registro de los datos del usuario
                $userRepo = $em->getRepository("App\Entity\User");
                $usuario = $userRepo->findOneBy(['email'=>$correo]);
                if($usuario instanceOf User){
                    $usuario->setPassTemporal($cad);
                    $em->persist($usuario);
                    $em->flush();
                }

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            return $response;
        }
        return $this->json([
           
        ]);

    }

}
