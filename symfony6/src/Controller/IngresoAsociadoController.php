<?php

namespace App\Controller;
use App\Entity\Persona;
use App\Entity\User;
use App\Entity\Asociado;
use App\Entity\EstadoFamiliar;
use App\Entity\Conyuge;
use App\Entity\Documento;
use App\Entity\DUI;
use App\Entity\NUP;
use App\Entity\ISSS;
use App\Entity\CarnetMinoridad;
use App\Entity\Pasaporte;
use App\Entity\NIT;
use App\Entity\UbicacionGeografica;
use App\Entity\Direccion;
use App\Entity\ActividadEconomica;
use App\Entity\Negocio;
use App\Entity\EstudioSocioEconomico;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class IngresoAsociadoController extends AbstractController
{
    #[Route('/ingreso-asociado', name: 'app_ingreso_asociado')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IngresoAsociadoController',
        ]);
    }

    /**
     * @Route("/solicitud", name="solicitud_ingreso")
     */
    public function llenarSolictud(Request $request, EntityManagerInterface $em)
    {
        //Se recoge el json con todos los datos
        $datos = json_decode($request->getContent());
        //Se prosigue a asignar a cada atributo de cada clase los valores obtenidos del json
        //Seteando los datos a persona
        $persona = new Persona();
        $persona->setPrimerNombre($datos->{'primerNombre'});
        $persona->setSegundoNombre($datos->{'segundoNombre'});
        $persona->setTercerNombre($datos->{'tercerNombre'});
        $persona->setPrimerApellido($datos->{'primerApellido'});
        $persona->setSegundoApellido($datos->{'segundoApellido'});
        $persona->setApellidoCasada($datos->{'apellidoCasada'});
        $persona->setCelular($datos->{'celular'});
        $persona->setCorreo($datos->{'correo'});
        $persona->setEdad($datos->{'edad'});
        $persona->setFechaNacimiento($datos->{'fechaNacimiento'});
        $em->persist($persona);
        $em->flush();

        /*//Aqui se recoge el id de la persona previamente ingresada para posteriormente colocarle el id a asociado
        $persoRepo = $em->getRepository("App\Entity\Persona");
        $persona1 = $persoRepo->findOneBy(['correo'=>$persona->getCorreo()]);
        $idPersona = '';
        if($persona1 instanceOf Persona){
            $idPersona = $persona1->getId();
            echo $persona1->getId();
        }*/
        //Se setean algunos datos en asociado
        $asociado = new Asociado();
        $asociado->setPersona($persona);
        $asociado->setGenero($datos->{'genero'});
        $asociado->setPaisNacimiento($datos->{'paisNacimiento'});
        //OJO: NO SE PONE:
        //$em->persist($asociado);
        //$em->flush(); PORQUE FALTA SETAR DATOS AUN PARA ESTA ENTIDAD
        //Se setean datos de estado civil y conyugue
        $conyugePersona = new Persona();
        $conyugePersona->setPrimerNombre($datos->{'primerNombreConyugue'});
        $conyugePersona->setSegundoNombre($datos->{'segundoNombreConyugue'});
        $conyugePersona->setTercerNombre($datos->{'tercerNombreConyugue'});
        $conyugePersona->setPrimerApellido($datos->{'primerApellidoConyugue'});
        $conyugePersona->setSegundoApellido($datos->{'segundoApellidoConyugue'});
        $conyugePersona->setApellidoCasada($datos->{'apellidoCasadaConyugue'});
        $conyugePersona->setCelular($datos->{'celularConyugue'});
        $conyugePersona->setCorreo($datos->{'correoConyugue'});
        $conyugePersona->setEdad($datos->{'edadConyugue'});
        $conyugePersona->setFechaNacimiento($datos->{'fechaNacimientoConyugue'});
        $em->persist($conyugePersona);
        $em->flush();
        //Se crea el objeto conyugue a partir de conyuguePersona
        $conyuge = new Conyuge();
        $conyuge->setPersona($conyugePersona);
        $em->persist($conyuge);
        $em->flush();
        //Se coloca conyugue a estado familiar
        $estadoFamiliar =  new EstadoFamiliar();
        $estadoFamiliar->setConyuge($conyuge);
        $estadoFamiliar->setEstadoCivil($datos->{'estadoCivil'});
        $em->persist($estadoFamiliar);
        $em->flush();
        //Se le coloca el estado familiar a asociado
        $asociado->setEstadoFamiliar($estadoFamiliar);

        //Parte de documentos de identificacion
        //DUI
        $documentoDui = new Documento();
        $documentoDui->setNumero($datos->{'dui'});
        $em->persist($documentoDui);
        $em->flush();
        $dui = new Dui();
        $dui->setDocumento2($documentoDui);
        $em->persist($dui);
        $em->flush();
        //NIT
        $documentoNit = new Documento();
        $documentoNit->setNumero($datos->{'nit'});
        $em->persist($documentoNit);
        $em->flush();
        $nit = new NIT();
        $nit->setDocumento4($documentoNit);
        $em->persist($nit);
        $em->flush();
        //carnet menoridad
        $documentoMinoridad = new Documento();
        $documentoMinoridad->setNumero($datos->{'minoridad'});
        $em->persist($documentoMinoridad);
        $em->flush();
        $carnetMenor = new CarnetMinoridad();
        $carnetMenor->setDocumento7($documentoMinoridad);
        $em->persist($carnetMenor);
        $em->flush();
        //ISSS
        $documentoISSS = new Documento();
        $documentoISSS->setNumero($datos->{'isss'});
        $em->persist($documentoISSS);
        $em->flush();
        $isss = new ISSS();
        $isss->setDocumento3($documentoISSS);
        $em->persist($isss);
        $em->flush();
        //NUP
        $documentoNUP = new Documento();
        $documentoNUP->setNumero($datos->{'nup'});
        $em->persist($documentoNUP);
        $em->flush();
        $nup = new NUP();
        $nup->setDocumento5($documentoNUP);
        $em->persist($nup);
        $em->flush();
        //PASAPORTE
        $documentoPasaporte = new Documento();
        $documentoPasaporte->setNumero($datos->{'pasaporte'});
        $em->persist($documentoPasaporte);
        $em->flush();
        $pasaporte = new Pasaporte();
        $pasaporte->setDocumento6($documentoPasaporte);
        $em->persist($pasaporte);
        $em->flush();
        
        //FIN DE LA PRIMERA FASE DE INGRESO
        //FASE DE LA UBICACION DEL HOGAR
        $ubicacionG =  new UbicacionGeografica();
        $ubicacionG->setPais($datos->{'pais'});
        $ubicacionG->setRegion($datos->{'region'});
        $ubicacionG->setSubRegion($datos->{'subRegion'});
        $ubicacionG->setLatitud($datos->{'latitud'});
        $ubicacionG->setLongitud($datos->{'longitud'});
        $em->persist($ubicacionG);
        $em->flush();

        $direccion = new Direccion();
        $direccion->setResidencia($datos->{'residencia'});
        $direccion->setAlquila($datos->{'alquila'});
        $direccion->setCalle($datos->{'calle'});
        $direccion->setNumeroCasa($datos->{'numeroCasa'});
        $direccion->setUbicaciongeografica($ubicacionG);
        $em->persist($direccion);
        $em->flush();
        //SE LE ADICIONA LA INFORMACION DE DIRECCION A ASOCIADO
        $asociado->setDireccion($direccion);
        //FIN DE VISTA DE UBICACION

        //ACTIVIDAD ECONOMICA
        $actividadEconomicaEmpleado =  new ActividadEconomica();
        $actividadEconomicaEmpleado->setEmpleado($datos->{'empleadoEmpleado'});
        $actividadEconomicaEmpleado->setEmpresario($datos->{'empresarioEmpleado'});
        $actividadEconomicaEmpleado->setProfesion($datos->{'profesionEmpleado'});
        $actividadEconomicaEmpleado->setRubroActividadEconomica($datos->{'rubroEmpleado'});
        $actividadEconomicaEmpleado->setSalario($datos->{'salarioEmpleado'});
        $actividadEconomicaEmpleado->setConstanciaSalario($datos->{'constanciaSalarioEmpleado'});

        //Empresario o emprendedor
        $actividadEconomicaEmpresario =  new ActividadEconomica();
        $actividadEconomicaEmpresario->setEmpleado($datos->{'empleadoEmpresario'});
        $actividadEconomicaEmpresario->setEmpresario($datos->{'empresarioEmpresario'});
        $actividadEconomicaEmpresario->setProfesion($datos->{'profesionEmpresario'});
        $actividadEconomicaEmpresario->setRubroActividadEconomica($datos->{'rubroEmpresario'});
        $actividadEconomicaEmpresario->setSalario($datos->{'salarioEmpresario'});
        $actividadEconomicaEmpresario->setConstanciaSalario($datos->{'constanciaSalarioEmpresario'});

        //Datos de la ubicacion del negocio
        $ubicacionGEmpresario =  new UbicacionGeografica();
        $ubicacionGEmpresario->setPais($datos->{'paisEmpresario'});
        $ubicacionGEmpresario->setRegion($datos->{'regionEmpresario'});
        $ubicacionGEmpresario->setSubRegion($datos->{'subRegionEmpresario'});
        $ubicacionGEmpresario->setLatitud($datos->{'latitudEmpresario'});
        $ubicacionGEmpresario->setLongitud($datos->{'longitudEmpresario'});
        $em->persist($ubicacionGEmpresario);
        $em->flush();

        $direccionEmpresario = new Direccion();
        $direccionEmpresario->setResidencia($datos->{'residenciaEmpresario'});
        $direccionEmpresario->setAlquila($datos->{'alquilaEmpresario'});
        $direccionEmpresario->setCalle($datos->{'calleEmpresario'});
        $direccionEmpresario->setNumeroCasa($datos->{'numeroCasaEmpresario'});
        $direccionEmpresario->setUbicaciongeografica($ubicacionGEmpresario);
        $em->persist($direccionEmpresario);
        $em->flush();

        //negocio

        //Estudio socioeconomico
        $estudioSocioEconomico = new EstudioSocioEconomico();
        $estudioSocioEconomico->setCapacidadAhorro($datos->{'capacidadAhorro'});
        $estudioSocioEconomico->setGastosMedicos($datos->{'gastosMedicos'});
        $estudioSocioEconomico->setGastosCredito($datos->{'gastosCredito'});
        $estudioSocioEconomico->setGastosEducacion($datos->{'gastosEducacion'});
        $estudioSocioEconomico->setGastosFijos($datos->{'gastosFijos'});
        $estudioSocioEconomico->setOtrosIngresos($datos->{'otrosIngresos'});
        $estudioSocioEconomico->setGastosPersonales($datos->{'gastosPersonales'});
        $em->persist($estudioSocioEconomico);
        $em->flush();

        //HACIENDO EL PERSIST PARA LAS DOS ENTIDADES DE EMPLEADO Y EMPRESARIO, YA QUE AMNBAS NECESITAN UN ESTUDIO SOCIOECONOMICO
        
        $actividadEconomicaEmpleado->setEstudioSocioEconomico($estudioSocioEconomico);
        //$em->persist($actividadEconomicaEmpleado);
        //$em->flush();
        
        $actividadEconomicaEmpresario->setEstudioSocioEconomico($estudioSocioEconomico);
        if($actividadEconomicaEmpleado){
            $em->persist($actividadEconomicaEmpleado);
            $em->flush();
        }elseif ($actividadEconomicaEmpresario) {
            $em->persist($actividadEconomicaEmpresario);
            $em->flush();
        }
        
        

        //
        //Negocio
        $negocio = new Negocio();
        $negocio->setDireccion($direccionEmpresario);
        $negocio->setNombreLegal($datos->{'nombreLegal'});
        $negocio->setNombreComercial($datos->{'nombreComercial'});
        $negocio->setTelefono($datos->{'telefonoNegocio'});
        $negocio->setCorreo($datos->{'correoNegocio'});
        $negocio->setActividadEconomica($actividadEconomicaEmpresario);
        $em->persist($negocio);
        $em->flush();

        //Impresion del json previamente tomado por post
        if(!$datos)
        {
           
        }else{
            $response = new Response();
            
            $response->setContent(json_encode([
                'data' => $datos,
            ]));
            
        }
        
        return $response->send();
    }
}
