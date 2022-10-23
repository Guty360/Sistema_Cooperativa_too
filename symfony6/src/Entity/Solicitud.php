<?php

namespace App\Entity;

use App\Repository\SolicitudRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SolicitudRepository::class)]
class Solicitud
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $codigo = null;

    #[ORM\Column]
    private ?bool $estadoSolicitud = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechaEnvio = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechaIngreso = null;

    #[ORM\Column(length: 255)]
    private ?string $solicitudFirmada = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function isEstadoSolicitud(): ?bool
    {
        return $this->estadoSolicitud;
    }

    public function setEstadoSolicitud(bool $estadoSolicitud): self
    {
        $this->estadoSolicitud = $estadoSolicitud;

        return $this;
    }

    public function getFechaEnvio(): ?\DateTimeInterface
    {
        return $this->fechaEnvio;
    }

    public function setFechaEnvio(\DateTimeInterface $fechaEnvio): self
    {
        $this->fechaEnvio = $fechaEnvio;

        return $this;
    }

    public function getFechaIngreso(): ?\DateTimeInterface
    {
        return $this->fechaIngreso;
    }

    public function setFechaIngreso(\DateTimeInterface $fechaIngreso): self
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    public function getSolicitudFirmada(): ?string
    {
        return $this->solicitudFirmada;
    }

    public function setSolicitudFirmada(string $solicitudFirmada): self
    {
        $this->solicitudFirmada = $solicitudFirmada;

        return $this;
    }
}
