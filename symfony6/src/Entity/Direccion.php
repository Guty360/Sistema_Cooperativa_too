<?php

namespace App\Entity;

use App\Repository\DireccionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DireccionRepository::class)]
class Direccion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $alquila = null;

    #[ORM\Column(length: 255)]
    private ?string $residencia = null;

    #[ORM\Column(length: 255)]
    private ?string $calle = null;

    #[ORM\Column(length: 255)]
    private ?string $numeroCasa = null;

    #[ORM\OneToOne(mappedBy: 'Direccion', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    #[ORM\OneToOne(inversedBy: 'direccion', cascade: ['persist', 'remove'])]
    private ?UbicacionGeografica $ubicaciongeografica = null;

    #[ORM\OneToOne(mappedBy: 'Direccion', cascade: ['persist', 'remove'])]
    private ?Negocio $negocio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isAlquila(): ?bool
    {
        return $this->alquila;
    }

    public function setAlquila(bool $alquila): self
    {
        $this->alquila = $alquila;

        return $this;
    }

    public function getResidencia(): ?string
    {
        return $this->residencia;
    }

    public function setResidencia(string $residencia): self
    {
        $this->residencia = $residencia;

        return $this;
    }

    public function getCalle(): ?string
    {
        return $this->calle;
    }

    public function setCalle(string $calle): self
    {
        $this->calle = $calle;

        return $this;
    }

    public function getNumeroCasa(): ?string
    {
        return $this->numeroCasa;
    }

    public function setNumeroCasa(string $numeroCasa): self
    {
        $this->numeroCasa = $numeroCasa;

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
            $this->asociado->setDireccion(null);
        }

        // set the owning side of the relation if necessary
        if ($asociado !== null && $asociado->getDireccion() !== $this) {
            $asociado->setDireccion($this);
        }

        $this->asociado = $asociado;

        return $this;
    }

    public function getUbicaciongeografica(): ?UbicacionGeografica
    {
        return $this->ubicaciongeografica;
    }

    public function setUbicaciongeografica(?UbicacionGeografica $ubicaciongeografica): self
    {
        $this->ubicaciongeografica = $ubicaciongeografica;

        return $this;
    }

    public function getNegocio(): ?Negocio
    {
        return $this->negocio;
    }

    public function setNegocio(Negocio $negocio): self
    {
        // set the owning side of the relation if necessary
        if ($negocio->getDireccion() !== $this) {
            $negocio->setDireccion($this);
        }

        $this->negocio = $negocio;

        return $this;
    }
}
