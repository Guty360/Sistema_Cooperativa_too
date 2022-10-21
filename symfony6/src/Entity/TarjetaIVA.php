<?php

namespace App\Entity;

use App\Repository\TarjetaIVARepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TarjetaIVARepository::class)]
class TarjetaIVA
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Documento $Documento1 = null;

    #[ORM\OneToOne(mappedBy: 'TarjetaIVA', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocumento1(): ?Documento
    {
        return $this->Documento1;
    }

    public function setDocumento1(?Documento $Documento1): self
    {
        $this->Documento1 = $Documento1;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(Asociado $asociado): self
    {
        // set the owning side of the relation if necessary
        if ($asociado->getTarjetaIVA() !== $this) {
            $asociado->setTarjetaIVA($this);
        }

        $this->asociado = $asociado;

        return $this;
    }
}
