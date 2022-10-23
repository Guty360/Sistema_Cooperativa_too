<?php

namespace App\Entity;

use App\Repository\NUPRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NUPRepository::class)]
class NUP
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'nUP', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Documento $Documento5 = null;

    #[ORM\OneToOne(mappedBy: 'NUP', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocumento5(): ?Documento
    {
        return $this->Documento5;
    }

    public function setDocumento5(Documento $Documento5): self
    {
        $this->Documento5 = $Documento5;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(Asociado $asociado): self
    {
        // set the owning side of the relation if necessary
        if ($asociado->getNUP() !== $this) {
            $asociado->setNUP($this);
        }

        $this->asociado = $asociado;

        return $this;
    }
}
