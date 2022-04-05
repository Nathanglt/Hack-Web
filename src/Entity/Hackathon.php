<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hackathon
 *
 * @ORM\Table(name="hackathon")
 * @ORM\Entity(repositoryClass="App\Repository\HackathonRepository")
 */
class Hackathon
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdHackathon", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhackathon;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateDebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="HeureDebut", type="time", nullable=true)
     */
    private $heuredebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DateFin", type="date", nullable=true)
     */
    private $datefin;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="HeureFin", type="time", nullable=true)
     */
    private $heurefin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Lieu", type="string", length=255, nullable=true)
     */
    private $lieu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Rue", type="string", length=255, nullable=true)
     */
    private $rue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CodePostal", type="string", length=5, nullable=true, options={"fixed"=true})
     */
    private $codepostal;

    /**
     * @var string
     *
     * @ORM\Column(name="Theme", type="string", length=255, nullable=false)
     */
    private $theme;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DateLimite", type="date", nullable=true)
     */
    private $datelimite;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NbPlaces", type="integer", nullable=true)
     */
    private $nbplaces;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Image", type="string", length=256, nullable=true)
     */
    private $image;

    public function getIdhackathon(): ?int
    {
        return $this->idhackathon;
    }

    public function setIdhackathon($idhackathon): self
    {
        $this->idhackathon = $idhackathon;

        return $this;
    }

    public function getDatedebut()
    {
        return $this->datedebut;
    }

    public function setDatedebut($datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getHeuredebut()
    {
        return $this->heuredebut;
    }

    public function setHeuredebut($heuredebut): self
    {
        $this->heuredebut = $heuredebut;

        return $this;
    }

    public function getDatefin()
    {
        return $this->datefin;
    }

    public function setDatefin($datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }

    public function getHeurefin()
    {
        return $this->heurefin;
    }

    public function setHeurefin($heurefin): self
    {
        $this->heurefin = $heurefin;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(?string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(?string $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getDatelimite()
    {
        return $this->datelimite;
    }

    public function setDatelimite($datelimite): self
    {
        $this->datelimite = $datelimite;

        return $this;
    }

    public function getNbplaces(): ?int
    {
        return $this->nbplaces;
    }

    public function setNbplaces(?int $nbplaces): self
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    private function hydrate(array $donnees)
    {
  foreach ($donnees as $key => $value)
  {
    // On récupère le nom du setter correspondant à l'attribut.
    $method = 'set'.ucfirst($key);

    // Si le setter correspondant existe.
    if (method_exists($this, $method))
    {
      // On appelle le setter.
      $this->$method($value);
    }
  }
}
public function __construct(array $donnees){
    $this->hydrate($donnees);
}


}