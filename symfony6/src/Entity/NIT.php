<?php

namespace App\Entity;

use App\Repository\NITRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NITRepository::class)]
class NIT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'nIT', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Documento $Documento4 = null;

    #[ORM\OneToOne(mappedBy: 'NIT', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocumento4(): ?Documento
    {
        return $this->Documento4;
    }

    public function setDocumento4(Documento $Documento4): self
    {
        $this->Documento4 = $Documento4;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(Asociado $asociado): self
    {
        // set the owning side of the relation if necessary
        if ($asociado->getNIT() !== $this) {
            $asociado->setNIT($this);
        }

        $this->asociado = $asociado;

        return $this;
    }
}
