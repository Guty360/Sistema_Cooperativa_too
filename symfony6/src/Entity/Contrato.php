<?php

namespace App\Entity;

use App\Repository\ContratoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratoRepository::class)]
class Contrato
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $codigo = null;

    #[ORM\Column]
    private ?int $fotocopia = null;

    #[ORM\OneToOne(mappedBy: 'Contrato', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getFotocopia(): ?int
    {
        return $this->fotocopia;
    }

    public function setFotocopia(int $fotocopia): self
    {
        $this->fotocopia = $fotocopia;

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
            $this->asociado->setContrato(null);
        }

        // set the owning side of the relation if necessary
        if ($asociado !== null && $asociado->getContrato() !== $this) {
            $asociado->setContrato($this);
        }

        $this->asociado = $asociado;

        return $this;
    }
}
