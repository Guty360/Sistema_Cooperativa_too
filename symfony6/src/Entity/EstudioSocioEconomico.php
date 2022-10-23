<?php

namespace App\Entity;

use App\Repository\EstudioSocioEconomicoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstudioSocioEconomicoRepository::class)]
class EstudioSocioEconomico
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $capacidadAhorro = null;

    #[ORM\Column]
    private ?float $gastosMedicos = null;

    #[ORM\Column]
    private ?float $gastosCredito = null;

    #[ORM\Column]
    private ?float $gastosEducacion = null;

    #[ORM\Column]
    private ?float $gastosFijos = null;

    #[ORM\Column]
    private ?float $otrosIngresos = null;

    #[ORM\Column]
    private ?float $gastosPersonales = null;

    #[ORM\OneToOne(mappedBy: 'EstudioSocioEconomico', cascade: ['persist', 'remove'])]
    private ?ActividadEconomica $actividadEconomica = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapacidadAhorro(): ?float
    {
        return $this->capacidadAhorro;
    }

    public function setCapacidadAhorro(float $capacidadAhorro): self
    {
        $this->capacidadAhorro = $capacidadAhorro;

        return $this;
    }

    public function getGastosMedicos(): ?float
    {
        return $this->gastosMedicos;
    }

    public function setGastosMedicos(float $gastosMedicos): self
    {
        $this->gastosMedicos = $gastosMedicos;

        return $this;
    }

    public function getGastosCredito(): ?float
    {
        return $this->gastosCredito;
    }

    public function setGastosCredito(float $gastosCredito): self
    {
        $this->gastosCredito = $gastosCredito;

        return $this;
    }

    public function getGastosEducacion(): ?float
    {
        return $this->gastosEducacion;
    }

    public function setGastosEducacion(float $gastosEducacion): self
    {
        $this->gastosEducacion = $gastosEducacion;

        return $this;
    }

    public function getGastosFijos(): ?float
    {
        return $this->gastosFijos;
    }

    public function setGastosFijos(float $gastosFijos): self
    {
        $this->gastosFijos = $gastosFijos;

        return $this;
    }

    public function getOtrosIngresos(): ?float
    {
        return $this->otrosIngresos;
    }

    public function setOtrosIngresos(float $otrosIngresos): self
    {
        $this->otrosIngresos = $otrosIngresos;

        return $this;
    }

    public function getGastosPersonales(): ?float
    {
        return $this->gastosPersonales;
    }

    public function setGastosPersonales(float $gastosPersonales): self
    {
        $this->gastosPersonales = $gastosPersonales;

        return $this;
    }

    public function getActividadEconomica(): ?ActividadEconomica
    {
        return $this->actividadEconomica;
    }

    public function setActividadEconomica(ActividadEconomica $actividadEconomica): self
    {
        // set the owning side of the relation if necessary
        if ($actividadEconomica->getEstudioSocioEconomico() !== $this) {
            $actividadEconomica->setEstudioSocioEconomico($this);
        }

        $this->actividadEconomica = $actividadEconomica;

        return $this;
    }
}
