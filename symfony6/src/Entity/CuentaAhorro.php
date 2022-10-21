<?php

namespace App\Entity;

use App\Repository\CuentaAhorroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CuentaAhorroRepository::class)]
class CuentaAhorro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Cuenta $Cuenta = null;

    #[ORM\OneToOne(mappedBy: 'CuentaAhorro', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCuenta(): ?Cuenta
    {
        return $this->Cuenta;
    }

    public function setCuenta(?Cuenta $Cuenta): self
    {
        $this->Cuenta = $Cuenta;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(Asociado $asociado): self
    {
        // set the owning side of the relation if necessary
        if ($asociado->getCuentaAhorro() !== $this) {
            $asociado->setCuentaAhorro($this);
        }

        $this->asociado = $asociado;

        return $this;
    }
}
