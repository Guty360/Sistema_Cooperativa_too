<?php

namespace App\Entity;

use App\Repository\CuentaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CuentaRepository::class)]
class Cuenta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numero = null;

    #[ORM\Column]
    private ?float $cuotaMensual = null;

    #[ORM\OneToOne(mappedBy: 'Cuenta', cascade: ['persist', 'remove'])]
    private ?CuentaAportacion $cuentaAportacion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getCuotaMensual(): ?float
    {
        return $this->cuotaMensual;
    }

    public function setCuotaMensual(float $cuotaMensual): self
    {
        $this->cuotaMensual = $cuotaMensual;

        return $this;
    }

    public function getCuentaAportacion(): ?CuentaAportacion
    {
        return $this->cuentaAportacion;
    }

    public function setCuentaAportacion(CuentaAportacion $cuentaAportacion): self
    {
        // set the owning side of the relation if necessary
        if ($cuentaAportacion->getCuenta() !== $this) {
            $cuentaAportacion->setCuenta($this);
        }

        $this->cuentaAportacion = $cuentaAportacion;

        return $this;
    }
}
