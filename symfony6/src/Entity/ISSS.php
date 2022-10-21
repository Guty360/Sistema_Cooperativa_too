<?php

namespace App\Entity;

use App\Repository\ISSSRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ISSSRepository::class)]
class ISSS
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'iSSS', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Documento $Documento3 = null;

    #[ORM\OneToOne(mappedBy: 'ISSS', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocumento3(): ?Documento
    {
        return $this->Documento3;
    }

    public function setDocumento3(Documento $Documento3): self
    {
        $this->Documento3 = $Documento3;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(Asociado $asociado): self
    {
        // set the owning side of the relation if necessary
        if ($asociado->getISSS() !== $this) {
            $asociado->setISSS($this);
        }

        $this->asociado = $asociado;

        return $this;
    }
}
