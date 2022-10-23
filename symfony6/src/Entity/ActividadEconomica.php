<?php

namespace App\Entity;

use App\Repository\ActividadEconomicaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActividadEconomicaRepository::class)]
class ActividadEconomica
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $constanciaSalario = null;

    #[ORM\Column]
    private ?bool $empresario = null;

    #[ORM\Column]
    private ?bool $empleado = null;

    #[ORM\Column(length: 255)]
    private ?string $profesion = null;

    #[ORM\Column(length: 255)]
    private ?string $rubroActividadEconomica = null;

    #[ORM\Column]
    private ?float $salario = null;

    #[ORM\OneToOne(mappedBy: 'ActividadEconomica', cascade: ['persist', 'remove'])]
    private ?Asociado $asociado = null;

    #[ORM\OneToMany(mappedBy: 'actividadEconomica', targetEntity: Negocio::class, orphanRemoval: true)]
    private Collection $Negocio;

    #[ORM\OneToOne(inversedBy: 'actividadEconomica', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?EstudioSocioEconomico $EstudioSocioEconomico = null;

    public function __construct()
    {
        $this->Negocio = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConstanciaSalario(): ?string
    {
        return $this->constanciaSalario;
    }

    public function setConstanciaSalario(string $constanciaSalario): self
    {
        $this->constanciaSalario = $constanciaSalario;

        return $this;
    }

    public function isEmpresario(): ?bool
    {
        return $this->empresario;
    }

    public function setEmpresario(bool $empresario): self
    {
        $this->empresario = $empresario;

        return $this;
    }

    public function isEmpleado(): ?bool
    {
        return $this->empleado;
    }

    public function setEmpleado(bool $empleado): self
    {
        $this->empleado = $empleado;

        return $this;
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

    public function getRubroActividadEconomica(): ?string
    {
        return $this->rubroActividadEconomica;
    }

    public function setRubroActividadEconomica(string $rubroActividadEconomica): self
    {
        $this->rubroActividadEconomica = $rubroActividadEconomica;

        return $this;
    }

    public function getSalario(): ?float
    {
        return $this->salario;
    }

    public function setSalario(float $salario): self
    {
        $this->salario = $salario;

        return $this;
    }

    public function getAsociado(): ?Asociado
    {
        return $this->asociado;
    }

    public function setAsociado(Asociado $asociado): self
    {
        // set the owning side of the relation if necessary
        if ($asociado->getActividadEconomica() !== $this) {
            $asociado->setActividadEconomica($this);
        }

        $this->asociado = $asociado;

        return $this;
    }

    /**
     * @return Collection<int, Negocio>
     */
    public function getNegocio(): Collection
    {
        return $this->Negocio;
    }

    public function addNegocio(Negocio $negocio): self
    {
        if (!$this->Negocio->contains($negocio)) {
            $this->Negocio->add($negocio);
            $negocio->setActividadEconomica($this);
        }

        return $this;
    }

    public function removeNegocio(Negocio $negocio): self
    {
        if ($this->Negocio->removeElement($negocio)) {
            // set the owning side to null (unless already changed)
            if ($negocio->getActividadEconomica() === $this) {
                $negocio->setActividadEconomica(null);
            }
        }

        return $this;
    }

    public function getEstudioSocioEconomico(): ?EstudioSocioEconomico
    {
        return $this->EstudioSocioEconomico;
    }

    public function setEstudioSocioEconomico(EstudioSocioEconomico $EstudioSocioEconomico): self
    {
        $this->EstudioSocioEconomico = $EstudioSocioEconomico;

        return $this;
    }
}
