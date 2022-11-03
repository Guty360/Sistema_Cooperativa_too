<?php

namespace App\Entity;

use App\Repository\PersonaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: PersonaRepository::class)]
class Persona
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $primerNombre = null;

    #[ORM\Column(length: 255)]
    private ?string $segundoNombre = null;

    #[ORM\Column(length: 255)]
    private ?string $tercerNombre = null;

    #[ORM\Column(length: 255)]
    private ?string $primerApellido = null;

    #[ORM\Column(length: 255)]
    private ?string $apellidoCasada = null;

    #[ORM\Column(length: 255)]
    private ?string $celular = null;

    #[ORM\Column(length: 255)]
    private ?string $correo = null;

    #[ORM\Column]
    private ?int $edad = null;

    #[ORM\Column(length: 255)]
    private ?string $fechaNacimiento = null;

    #[ORM\OneToOne(mappedBy: 'Persona', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    #[ORM\OneToOne(mappedBy: 'Persona', cascade: ['persist', 'remove'])]
    private ?Beneficiario $beneficiario = null;

    #[ORM\OneToOne(mappedBy: 'Persona', cascade: ['persist', 'remove'])]
    private ?Conyuge $conyuge = null;

    #[ORM\OneToOne(mappedBy: 'Persona', cascade: ['persist', 'remove'])]
    private ?Referencia $referencia = null;

    #[ORM\Column(length: 255)]
    private ?string $segundoApellido = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrimerNombre(): ?string
    {
        return $this->primerNombre;
    }

    public function setPrimerNombre(string $primerNombre): self
    {
        $this->primerNombre = $primerNombre;

        return $this;
    }

    public function getSegundoNombre(): ?string
    {
        return $this->segundoNombre;
    }

    public function setSegundoNombre(string $segundoNombre): self
    {
        $this->segundoNombre = $segundoNombre;

        return $this;
    }

    public function getTercerNombre(): ?string
    {
        return $this->tercerNombre;
    }

    public function setTercerNombre(string $tercerNombre): self
    {
        $this->tercerNombre = $tercerNombre;

        return $this;
    }

    public function getPrimerApellido(): ?string
    {
        return $this->primerApellido;
    }

    public function setPrimerApellido(string $primerApellido): self
    {
        $this->primerApellido = $primerApellido;

        return $this;
    }

    public function getApellidoCasada(): ?string
    {
        return $this->apellidoCasada;
    }

    public function setApellidoCasada(string $apellidoCasada): self
    {
        $this->apellidoCasada = $apellidoCasada;

        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(string $celular): self
    {
        $this->celular = $celular;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getFechaNacimiento(): ?string
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(string $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(?Asociado $asociado): self
    {
        // unset the owning side of the relation if necessary
        if ($asociado === null && $this->asociado !== null) {
            $this->asociado->setPersona(null);
        }

        // set the owning side of the relation if necessary
        if ($asociado !== null && $asociado->getPersona() !== $this) {
            $asociado->setPersona($this);
        }

        $this->asociado = $asociado;

        return $this;
    }

    public function getBeneficiario(): ?Beneficiario
    {
        return $this->beneficiario;
    }

    public function setBeneficiario(Beneficiario $beneficiario): self
    {
        // set the owning side of the relation if necessary
        if ($beneficiario->getPersona() !== $this) {
            $beneficiario->setPersona($this);
        }

        $this->beneficiario = $beneficiario;

        return $this;
    }

    public function getConyuge(): ?Conyuge
    {
        return $this->conyuge;
    }

    public function setConyuge(?Conyuge $conyuge): self
    {
        // unset the owning side of the relation if necessary
        if ($conyuge === null && $this->conyuge !== null) {
            $this->conyuge->setPersona(null);
        }

        // set the owning side of the relation if necessary
        if ($conyuge !== null && $conyuge->getPersona() !== $this) {
            $conyuge->setPersona($this);
        }

        $this->conyuge = $conyuge;

        return $this;
    }

    public function getReferencia(): ?Referencia
    {
        return $this->referencia;
    }

    public function setReferencia(?Referencia $referencia): self
    {
        // unset the owning side of the relation if necessary
        if ($referencia === null && $this->referencia !== null) {
            $this->referencia->setPersona(null);
        }

        // set the owning side of the relation if necessary
        if ($referencia !== null && $referencia->getPersona() !== $this) {
            $referencia->setPersona($this);
        }

        $this->referencia = $referencia;

        return $this;
    }
    
    public function toArray()
        {
        return [/*'id' => $this->getPrimerApellido(),*/  'correo' => $this->correo, /*'edad' => $this->edad*/];
        }

    public function getSegundoApellido(): ?string
    {
        return $this->segundoApellido;
    }

    public function setSegundoApellido(string $segundoApellido): self
    {
        $this->segundoApellido = $segundoApellido;

        return $this;
    }
    }
