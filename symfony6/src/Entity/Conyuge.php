<?php

namespace App\Entity;

use App\Repository\ConyugeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConyugeRepository::class)]
class Conyuge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'conyuge', cascade: ['persist', 'remove'])]
    private ?Persona $Persona = null;

    #[ORM\OneToOne(mappedBy: 'Conyuge', cascade: ['persist', 'remove'])]
    private ?EstadoFamiliar $estadoFamiliar = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersona(): ?Persona
    {
        return $this->Persona;
    }

    public function setPersona(?Persona $Persona): self
    {
        $this->Persona = $Persona;

        return $this;
    }

    public function getEstadoFamiliar(): ?EstadoFamiliar
    {
        return $this->estadoFamiliar;
    }

    public function setEstadoFamiliar(?EstadoFamiliar $estadoFamiliar): self
    {
        // unset the owning side of the relation if necessary
        if ($estadoFamiliar === null && $this->estadoFamiliar !== null) {
            $this->estadoFamiliar->setConyuge(null);
        }

        // set the owning side of the relation if necessary
        if ($estadoFamiliar !== null && $estadoFamiliar->getConyuge() !== $this) {
            $estadoFamiliar->setConyuge($this);
        }

        $this->estadoFamiliar = $estadoFamiliar;

        return $this;
    }
}
