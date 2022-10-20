<?php

namespace App\Entity;

use App\Repository\UbicacionGeograficaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UbicacionGeograficaRepository::class)]
class UbicacionGeografica
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pais = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\Column(length: 255)]
    private ?string $subRegion = null;

    #[ORM\Column(length: 255)]
    private ?string $latitud = null;

    #[ORM\Column(length: 255)]
    private ?string $longitud = null;

    #[ORM\OneToOne(mappedBy: 'ubicaciongeografica', cascade: ['persist', 'remove'])]
    private ?Direccion $direccion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getSubRegion(): ?string
    {
        return $this->subRegion;
    }

    public function setSubRegion(string $subRegion): self
    {
        $this->subRegion = $subRegion;

        return $this;
    }

    public function getLatitud(): ?string
    {
        return $this->latitud;
    }

    public function setLatitud(string $latitud): self
    {
        $this->latitud = $latitud;

        return $this;
    }

    public function getLongitud(): ?string
    {
        return $this->longitud;
    }

    public function setLongitud(string $longitud): self
    {
        $this->longitud = $longitud;

        return $this;
    }

    public function getDireccion(): ?Direccion
    {
        return $this->direccion;
    }

    public function setDireccion(?Direccion $direccion): self
    {
        // unset the owning side of the relation if necessary
        if ($direccion === null && $this->direccion !== null) {
            $this->direccion->setUbicaciongeografica(null);
        }

        // set the owning side of the relation if necessary
        if ($direccion !== null && $direccion->getUbicaciongeografica() !== $this) {
            $direccion->setUbicaciongeografica($this);
        }

        $this->direccion = $direccion;

        return $this;
    }
}
