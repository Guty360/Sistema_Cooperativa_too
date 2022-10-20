<?php

namespace App\Entity;

use App\Repository\NegocioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NegocioRepository::class)]
class Negocio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombreLegal = null;

    #[ORM\Column(length: 255)]
    private ?string $nombreComercial = null;

    #[ORM\Column(length: 255)]
    private ?string $telefono = null;

    #[ORM\Column(length: 255)]
    private ?string $correo = null;

    #[ORM\OneToOne(inversedBy: 'negocio', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Direccion $Direccion = null;

    #[ORM\ManyToOne(inversedBy: 'Negocio')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ActividadEconomica $actividadEconomica = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreLegal(): ?string
    {
        return $this->nombreLegal;
    }

    public function setNombreLegal(string $nombreLegal): self
    {
        $this->nombreLegal = $nombreLegal;

        return $this;
    }

    public function getNombreComercial(): ?string
    {
        return $this->nombreComercial;
    }

    public function setNombreComercial(string $nombreComercial): self
    {
        $this->nombreComercial = $nombreComercial;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

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

    public function getDireccion(): ?Direccion
    {
        return $this->Direccion;
    }

    public function setDireccion(Direccion $Direccion): self
    {
        $this->Direccion = $Direccion;

        return $this;
    }

    public function getActividadEconomica(): ?ActividadEconomica
    {
        return $this->actividadEconomica;
    }

    public function setActividadEconomica(?ActividadEconomica $actividadEconomica): self
    {
        $this->actividadEconomica = $actividadEconomica;

        return $this;
    }
}
