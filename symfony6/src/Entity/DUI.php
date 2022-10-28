<?php

namespace App\Entity;

use App\Repository\DUIRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DUIRepository::class)]
class DUI
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Documento $Documento2 = null;

    #[ORM\OneToOne(mappedBy: 'DUI', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocumento2(): ?Documento
    {
        return $this->Documento2;
    }

    public function setDocumento2(?Documento $Documento2): self
    {
        $this->Documento2 = $Documento2;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(Asociado $asociado): self
    {
        // set the owning side of the relation if necessary
        if ($asociado->getDUI() !== $this) {
            $asociado->setDUI($this);
        }

        $this->asociado = $asociado;

        return $this;
    }
}
