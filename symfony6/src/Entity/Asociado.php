<?php

namespace App\Entity;

use App\Repository\AsociadoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: AsociadoRepository::class)]
class Asociado implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $telefonoTrabajo = null;

    #[ORM\Column(length: 255)]
    private ?string $telefonoFijo = null;

    #[ORM\Column(length: 255)]
    private ?string $genero = null;

    #[ORM\Column(length: 255)]
    private ?string $nacionalidad = null;

    #[ORM\Column(length: 255)]
    private ?string $paisNacimiento = null;

    #[ORM\OneToMany(mappedBy: 'asociado', targetEntity: Titulo::class)]
    private Collection $Titulo;

    #[ORM\OneToMany(mappedBy: 'asociado', targetEntity: Beneficiario::class)]
    private Collection $Beneficiario;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Solicitud $Solicitud = null;

    #[ORM\OneToOne(inversedBy: 'asociado', cascade: ['persist', 'remove'])]
    private ?Persona $Persona = null;

    #[ORM\OneToOne(inversedBy: 'asociado', cascade: ['persist', 'remove'])]
    private ?EstadoFamiliar $EstadoFamiliar = null;

    #[ORM\OneToMany(mappedBy: 'asociado', targetEntity: Referencia::class)]
    private Collection $Referencia;

    #[ORM\OneToOne(inversedBy: 'asociado', cascade: ['persist', 'remove'])]
    private ?Direccion $Direccion = null;

    #[ORM\OneToOne(inversedBy: 'asociado', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?ActividadEconomica $ActividadEconomica = null;

    public function __construct()
    {
        $this->Titulo = new ArrayCollection();
        $this->Beneficiario = new ArrayCollection();
        $this->Referencia = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }


    public function getTelefonoTrabajo(): ?string
    {
        return $this->telefonoTrabajo;
    }

    public function setTelefonoTrabajo(string $telefonoTrabajo): self
    {
        $this->telefonoTrabajo = $telefonoTrabajo;

        return $this;
    }

    public function getTelefonoFijo(): ?string
    {
        return $this->telefonoFijo;
    }

    public function setTelefonoFijo(string $telefonoFijo): self
    {
        $this->telefonoFijo = $telefonoFijo;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getNacionalidad(): ?string
    {
        return $this->nacionalidad;
    }

    public function setNacionalidad(string $nacionalidad): self
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }

    public function getPaisNacimiento(): ?string
    {
        return $this->paisNacimiento;
    }

    public function setPaisNacimiento(string $paisNacimiento): self
    {
        $this->paisNacimiento = $paisNacimiento;

        return $this;
    }

    /**
     * @return Collection<int, Titulo>
     */
    public function getTitulo(): Collection
    {
        return $this->Titulo;
    }

    public function addTitulo(Titulo $titulo): self
    {
        if (!$this->Titulo->contains($titulo)) {
            $this->Titulo->add($titulo);
            $titulo->setAsociado($this);
        }

        return $this;
    }

    public function removeTitulo(Titulo $titulo): self
    {
        if ($this->Titulo->removeElement($titulo)) {
            // set the owning side to null (unless already changed)
            if ($titulo->getAsociado() === $this) {
                $titulo->setAsociado(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Beneficiario>
     */
    public function getBeneficiario(): Collection
    {
        return $this->Beneficiario;
    }

    public function addBeneficiario(Beneficiario $beneficiario): self
    {
        if (!$this->Beneficiario->contains($beneficiario)) {
            $this->Beneficiario->add($beneficiario);
            $beneficiario->setAsociado($this);
        }

        return $this;
    }

    public function removeBeneficiario(Beneficiario $beneficiario): self
    {
        if ($this->Beneficiario->removeElement($beneficiario)) {
            // set the owning side to null (unless already changed)
            if ($beneficiario->getAsociado() === $this) {
                $beneficiario->setAsociado(null);
            }
        }

        return $this;
    }

    public function getSolicitud(): ?Solicitud
    {
        return $this->Solicitud;
    }

    public function setSolicitud(Solicitud $Solicitud): self
    {
        $this->Solicitud = $Solicitud;

        return $this;
    }

    public function getPersona(): ?Persona
    {
        return $this->Persona;
    }

    public function setPersona(?Persona $Persona): self
    {
        $this->Persona = $Persona;

        return $this;
    }

    public function getEstadoFamiliar(): ?EstadoFamiliar
    {
        return $this->EstadoFamiliar;
    }

    public function setEstadoFamiliar(?EstadoFamiliar $EstadoFamiliar): self
    {
        $this->EstadoFamiliar = $EstadoFamiliar;

        return $this;
    }

    /**
     * @return Collection<int, Referencia>
     */
    public function getReferencia(): Collection
    {
        return $this->Referencia;
    }

    public function addReferencium(Referencia $referencium): self
    {
        if (!$this->Referencia->contains($referencium)) {
            $this->Referencia->add($referencium);
            $referencium->setAsociado($this);
        }

        return $this;
    }

    public function removeReferencium(Referencia $referencium): self
    {
        if ($this->Referencia->removeElement($referencium)) {
            // set the owning side to null (unless already changed)
            if ($referencium->getAsociado() === $this) {
                $referencium->setAsociado(null);
            }
        }

        return $this;
    }

    public function getDireccion(): ?Direccion
    {
        return $this->Direccion;
    }

    public function setDireccion(?Direccion $Direccion): self
    {
        $this->Direccion = $Direccion;

        return $this;
    }

    public function getActividadEconomica(): ?ActividadEconomica
    {
        return $this->ActividadEconomica;
    }

    public function setActividadEconomica(ActividadEconomica $ActividadEconomica): self
    {
        $this->ActividadEconomica = $ActividadEconomica;

        return $this;
    }
}
