<?php

namespace App\Entity;

use App\Repository\CarnetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarnetRepository::class)]
class Carnet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechaEmision = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechaVencimiento = null;

    #[ORM\Column]
    private ?int $fotografia = null;

    #[ORM\Column(length: 255)]
    private ?string $numero = null;

    #[ORM\Column(length: 255)]
    private ?string $carnetGenerado = null;

    #[ORM\OneToOne(mappedBy: 'Carnet', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaEmision(): ?\DateTimeInterface
    {
        return $this->fechaEmision;
    }

    public function setFechaEmision(\DateTimeInterface $fechaEmision): self
    {
        $this->fechaEmision = $fechaEmision;

        return $this;
    }

    public function getFechaVencimiento(): ?\DateTimeInterface
    {
        return $this->fechaVencimiento;
    }

    public function setFechaVencimiento(\DateTimeInterface $fechaVencimiento): self
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    public function getFotografia(): ?int
    {
        return $this->fotografia;
    }

    public function setFotografia(int $fotografia): self
    {
        $this->fotografia = $fotografia;

        return $this;
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

    public function getCarnetGenerado(): ?string
    {
        return $this->carnetGenerado;
    }

    public function setCarnetGenerado(string $carnetGenerado): self
    {
        $this->carnetGenerado = $carnetGenerado;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(Asociado $asociado): self
    {
        // set the owning side of the relation if necessary
        if ($asociado->getCarnet() !== $this) {
            $asociado->setCarnet($this);
        }

        $this->asociado = $asociado;

        return $this;
    }
}
