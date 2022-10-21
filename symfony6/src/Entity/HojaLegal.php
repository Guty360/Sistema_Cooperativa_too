<?php

namespace App\Entity;

use App\Repository\HojaLegalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HojaLegalRepository::class)]
class HojaLegal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'hojaLegal', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Documento $Documento8 = null;

    #[ORM\OneToOne(mappedBy: 'HojaLegal', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocumento8(): ?Documento
    {
        return $this->Documento8;
    }

    public function setDocumento8(Documento $Documento8): self
    {
        $this->Documento8 = $Documento8;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(Asociado $asociado): self
    {
        // set the owning side of the relation if necessary
        if ($asociado->getHojaLegal() !== $this) {
            $asociado->setHojaLegal($this);
        }

        $this->asociado = $asociado;

        return $this;
    }
}
