<?php

namespace App\Entity;

use App\Repository\EstadoFamiliarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstadoFamiliarRepository::class)]
class EstadoFamiliar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $estadoCivil = null;

    #[ORM\OneToOne(mappedBy: 'EstadoFamiliar', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    #[ORM\OneToOne(inversedBy: 'estadoFamiliar', cascade: ['persist', 'remove'])]
    private ?Conyuge $Conyuge = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstadoCivil(): ?string
    {
        return $this->estadoCivil;
    }

    public function setEstadoCivil(string $estadoCivil): self
    {
        $this->estadoCivil = $estadoCivil;

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
            $this->asociado->setEstadoFamiliar(null);
        }

        // set the owning side of the relation if necessary
        if ($asociado !== null && $asociado->getEstadoFamiliar() !== $this) {
            $asociado->setEstadoFamiliar($this);
        }

        $this->asociado = $asociado;

        return $this;
    }

    public function getConyuge(): ?Conyuge
    {
        return $this->Conyuge;
    }

    public function setConyuge(?Conyuge $Conyuge): self
    {
        $this->Conyuge = $Conyuge;

        return $this;
    }
}
