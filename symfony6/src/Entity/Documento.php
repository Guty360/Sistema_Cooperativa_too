<?php

namespace App\Entity;

use App\Repository\DocumentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentoRepository::class)]
class Documento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numero = null;

    #[ORM\OneToOne(mappedBy: 'Documento3', cascade: ['persist', 'remove'])]
    private ?ISSS $iSSS = null;

    #[ORM\OneToOne(mappedBy: 'Documento4', cascade: ['persist', 'remove'])]
    private ?NIT $nIT = null;

    #[ORM\OneToOne(mappedBy: 'Documento5', cascade: ['persist', 'remove'])]
    private ?NUP $nUP = null;

    #[ORM\OneToOne(mappedBy: 'Documento6', cascade: ['persist', 'remove'])]
    private ?Pasaporte $pasaporte = null;

    #[ORM\OneToOne(mappedBy: 'Documento7', cascade: ['persist', 'remove'])]
    private ?CarnetMinoridad $carnetMinoridad = null;

    #[ORM\OneToOne(mappedBy: 'Documento8', cascade: ['persist', 'remove'])]
    private ?HojaLegal $hojaLegal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fotocopia = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getISSS(): ?ISSS
    {
        return $this->iSSS;
    }

    public function setISSS(ISSS $iSSS): self
    {
        // set the owning side of the relation if necessary
        if ($iSSS->getDocumento3() !== $this) {
            $iSSS->setDocumento3($this);
        }

        $this->iSSS = $iSSS;

        return $this;
    }

    public function getNIT(): ?NIT
    {
        return $this->nIT;
    }

    public function setNIT(NIT $nIT): self
    {
        // set the owning side of the relation if necessary
        if ($nIT->getDocumento4() !== $this) {
            $nIT->setDocumento4($this);
        }

        $this->nIT = $nIT;

        return $this;
    }

    public function getNUP(): ?NUP
    {
        return $this->nUP;
    }

    public function setNUP(NUP $nUP): self
    {
        // set the owning side of the relation if necessary
        if ($nUP->getDocumento5() !== $this) {
            $nUP->setDocumento5($this);
        }

        $this->nUP = $nUP;

        return $this;
    }

    public function getPasaporte(): ?Pasaporte
    {
        return $this->pasaporte;
    }

    public function setPasaporte(Pasaporte $pasaporte): self
    {
        // set the owning side of the relation if necessary
        if ($pasaporte->getDocumento6() !== $this) {
            $pasaporte->setDocumento6($this);
        }

        $this->pasaporte = $pasaporte;

        return $this;
    }

    public function getCarnetMinoridad(): ?CarnetMinoridad
    {
        return $this->carnetMinoridad;
    }

    public function setCarnetMinoridad(CarnetMinoridad $carnetMinoridad): self
    {
        // set the owning side of the relation if necessary
        if ($carnetMinoridad->getDocumento7() !== $this) {
            $carnetMinoridad->setDocumento7($this);
        }

        $this->carnetMinoridad = $carnetMinoridad;

        return $this;
    }

    public function getHojaLegal(): ?HojaLegal
    {
        return $this->hojaLegal;
    }

    public function setHojaLegal(HojaLegal $hojaLegal): self
    {
        // set the owning side of the relation if necessary
        if ($hojaLegal->getDocumento8() !== $this) {
            $hojaLegal->setDocumento8($this);
        }

        $this->hojaLegal = $hojaLegal;

        return $this;
    }

    public function getFotocopia(): ?string
    {
        return $this->fotocopia;
    }

    public function setFotocopia(?string $fotocopia): self
    {
        $this->fotocopia = $fotocopia;

        return $this;
    }
}
