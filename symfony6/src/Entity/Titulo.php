<?php

namespace App\Entity;

use App\Repository\TituloRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TituloRepository::class)]
class Titulo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $profesion = null;

    #[ORM\Column(length: 255)]
    private ?string $fotocopia = null;

    #[ORM\ManyToOne(inversedBy: 'Titulo')]
    private ?Asociado $asociado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfesion(): ?string
    {
        return $this->profesion;
    }

    public function setProfesion(string $profesion): self
    {
        $this->profesion = $profesion;

        return $this;
    }

    public function getFotocopia(): ?string
    {
        return $this->fotocopia;
    }

    public function setFotocopia(string $fotocopia): self
    {
        $this->fotocopia = $fotocopia;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(?Asociado $asociado): self
    {
        $this->asociado = $asociado;

        return $this;
    }
}
