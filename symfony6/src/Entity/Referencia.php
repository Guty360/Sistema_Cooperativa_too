<?php

namespace App\Entity;

use App\Repository\ReferenciaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReferenciaRepository::class)]
class Referencia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tipoReferencia = null;

    #[ORM\OneToOne(inversedBy: 'referencia', cascade: ['persist', 'remove'])]
    private ?Persona $Persona = null;

    #[ORM\ManyToOne(inversedBy: 'Referencia')]
    private ?Asociado $asociado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoReferencia(): ?string
    {
        return $this->tipoReferencia;
    }

    public function setTipoReferencia(string $tipoReferencia): self
    {
        $this->tipoReferencia = $tipoReferencia;

        return $this;
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

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(?Asociado $asociado): self
    {
        $this->asociado = $asociado;

        return $this;
    }
}
