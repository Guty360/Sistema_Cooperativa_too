<?php

namespace App\Entity;

use App\Repository\BeneficiarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BeneficiarioRepository::class)]
class Beneficiario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $porcentaje = null;

    #[ORM\Column(length: 255)]
    private ?string $parentesco = null;

    #[ORM\ManyToOne(inversedBy: 'Beneficiario')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Asociado $asociado = null;

    #[ORM\OneToOne(inversedBy: 'beneficiario', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Persona $Persona = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPorcentaje(): ?float
    {
        return $this->porcentaje;
    }

    public function setPorcentaje(float $porcentaje): self
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    public function getParentesco(): ?string
    {
        return $this->parentesco;
    }

    public function setParentesco(string $parentesco): self
    {
        $this->parentesco = $parentesco;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(?Asociado $asociado): self
    {
        $this->asociado = $asociado;

        return $this;
    }

    public function getPersona(): ?Persona
    {
        return $this->Persona;
    }

    public function setPersona(Persona $Persona): self
    {
        $this->Persona = $Persona;

        return $this;
    }
}
