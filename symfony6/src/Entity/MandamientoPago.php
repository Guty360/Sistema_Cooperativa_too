<?php

namespace App\Entity;

use App\Repository\MandamientoPagoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MandamientoPagoRepository::class)]
class MandamientoPago
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $codigo = null;

    #[ORM\Column]
    private ?bool $estado = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechaRealizadoPago = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechaEmision = null;

    #[ORM\Column]
    private ?float $totalAPagar = null;

    #[ORM\OneToOne(mappedBy: 'MandamientoPago', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    #[ORM\OneToMany(mappedBy: 'mandamientoPago', targetEntity: Cargo::class)]
    private Collection $Cargo;

    public function __construct()
    {
        $this->Cargo = new ArrayCollection();
    }

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

    public function isEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(bool $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getFechaRealizadoPago(): ?\DateTimeInterface
    {
        return $this->fechaRealizadoPago;
    }

    public function setFechaRealizadoPago(\DateTimeInterface $fechaRealizadoPago): self
    {
        $this->fechaRealizadoPago = $fechaRealizadoPago;

        return $this;
    }

    public function getFechaEmision(): ?\DateTimeInterface
    {
        return $this->fechaEmision;
    }

    public function setFechaEmision(\DateTimeInterface $fechaEmision): self
    {
        $this->fechaEmision = $fechaEmision;

        return $this;
    }

    public function getTotalAPagar(): ?float
    {
        return $this->totalAPagar;
    }

    public function setTotalAPagar(float $totalAPagar): self
    {
        $this->totalAPagar = $totalAPagar;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(Asociado $asociado): self
    {
        // set the owning side of the relation if necessary
        if ($asociado->getMandamientoPago() !== $this) {
            $asociado->setMandamientoPago($this);
        }

        $this->asociado = $asociado;

        return $this;
    }

    /**
     * @return Collection<int, Cargo>
     */
    public function getCargo(): Collection
    {
        return $this->Cargo;
    }

    public function addCargo(Cargo $cargo): self
    {
        if (!$this->Cargo->contains($cargo)) {
            $this->Cargo->add($cargo);
            $cargo->setMandamientoPago($this);
        }

        return $this;
    }

    public function removeCargo(Cargo $cargo): self
    {
        if ($this->Cargo->removeElement($cargo)) {
            // set the owning side to null (unless already changed)
            if ($cargo->getMandamientoPago() === $this) {
                $cargo->setMandamientoPago(null);
            }
        }

        return $this;
    }
}
