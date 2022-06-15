<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     */
    private $username;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity=Actualite::class, inversedBy="users")
     */
    private $Actualite;

    /**
     * @ORM\ManyToMany(targetEntity=Emploi::class, inversedBy="users")
     */
    private $Emploi;

    /**
     * @ORM\ManyToMany(targetEntity=Video::class, inversedBy="users")
     */
    private $Video;

    public function __construct()
    {
        $this->Actualite = new ArrayCollection();
        $this->Emploi = new ArrayCollection();
        $this->Video = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Actualite>
     */
    public function getActualite(): Collection
    {
        return $this->Actualite;
    }

    public function addActualite(Actualite $actualite): self
    {
        if (!$this->Actualite->contains($actualite)) {
            $this->Actualite[] = $actualite;
        }

        return $this;
    }

    public function removeActualite(Actualite $actualite): self
    {
        $this->Actualite->removeElement($actualite);

        return $this;
    }

    /**
     * @return Collection<int, Emploi>
     */
    public function getEmploi(): Collection
    {
        return $this->Emploi;
    }

    public function addEmploi(Emploi $emploi): self
    {
        if (!$this->Emploi->contains($emploi)) {
            $this->Emploi[] = $emploi;
        }

        return $this;
    }

    public function removeEmploi(Emploi $emploi): self
    {
        $this->Emploi->removeElement($emploi);

        return $this;
    }

    /**
     * @return Collection<int, Video>
     */
    public function getVideo(): Collection
    {
        return $this->Video;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->Video->contains($video)) {
            $this->Video[] = $video;
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        $this->Video->removeElement($video);

        return $this;
    }
}
