<?php

namespace App\Entity;

use App\Repository\CuentaAportacionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CuentaAportacionRepository::class)]
class CuentaAportacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'cuentaAportacion', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cuenta $Cuenta = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCuenta(): ?Cuenta
    {
        return $this->Cuenta;
    }

    public function setCuenta(Cuenta $Cuenta): self
    {
        $this->Cuenta = $Cuenta;

        return $this;
    }
}
