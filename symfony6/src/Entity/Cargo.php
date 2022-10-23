<?php

namespace App\Entity;

use App\Repository\CargoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CargoRepository::class)]
class Cargo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $cantidad = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\Column]
    private ?float $montoPago = null;

    #[ORM\ManyToOne(inversedBy: 'Cargo')]
    private ?MandamientoPago $mandamientoPago = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getMontoPago(): ?float
    {
        return $this->montoPago;
    }

    public function setMontoPago(float $montoPago): self
    {
        $this->montoPago = $montoPago;

        return $this;
    }

    public function getMandamientoPago(): ?MandamientoPago
    {
        return $this->mandamientoPago;
    }

    public function setMandamientoPago(?MandamientoPago $mandamientoPago): self
    {
        $this->mandamientoPago = $mandamientoPago;

        return $this;
    }
}
