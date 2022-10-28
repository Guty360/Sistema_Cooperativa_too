<?php

namespace App\Entity;

use App\Repository\CarnetMinoridadRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarnetMinoridadRepository::class)]
class CarnetMinoridad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'carnetMinoridad', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Documento $Documento7 = null;

    #[ORM\OneToOne(mappedBy: 'CarnetMinoridad', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocumento7(): ?Documento
    {
        return $this->Documento7;
    }

    public function setDocumento7(Documento $Documento7): self
    {
        $this->Documento7 = $Documento7;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(Asociado $asociado): self
    {
        // set the owning side of the relation if necessary
        if ($asociado->getCarnetMinoridad() !== $this) {
            $asociado->setCarnetMinoridad($this);
        }

        $this->asociado = $asociado;

        return $this;
    }
}
