<?php

namespace App\Entity;

use App\Repository\PasaporteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PasaporteRepository::class)]
class Pasaporte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'pasaporte', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Documento $Documento6 = null;

    #[ORM\OneToOne(mappedBy: 'Pasaporte', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocumento6(): ?Documento
    {
        return $this->Documento6;
    }

    public function setDocumento6(Documento $Documento6): self
    {
        $this->Documento6 = $Documento6;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(Asociado $asociado): self
    {
        // set the owning side of the relation if necessary
        if ($asociado->getPasaporte() !== $this) {
            $asociado->setPasaporte($this);
        }

        $this->asociado = $asociado;

        return $this;
    }
}
