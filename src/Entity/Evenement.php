<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement", indexes={@ORM\Index(name="Evenement_ibfk_2", columns={"IdTypeEvenement"}), @ORM\Index(name="Evenement_ibfk_1", columns={"IdHackathon"})})
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdEvenement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevenement;

    /**
     * @var string
     *
     * @ORM\Column(name="Theme", type="string", length=256, nullable=false)
     */
    private $theme;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HeureDebut", type="time", nullable=false)
     */
    private $heuredebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HeureFin", type="time", nullable=false)
     */
    private $heurefin;

    /**
     * @var int
     *
     * @ORM\Column(name="NbPlaces", type="integer", nullable=false)
     */
    private $nbplaces;

    /**
     * @var \Hackathon
     *
     * @ORM\ManyToOne(targetEntity="Hackathon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdHackathon", referencedColumnName="IdHackathon")
     * })
     */
    private $idhackathon;

    /**
     * @var \Typeevenement
     *
     * @ORM\ManyToOne(targetEntity="Typeevenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdTypeEvenement", referencedColumnName="IdType")
     * })
     */
    private $idtypeevenement;

    public function getIdevenement(): ?int
    {
        return $this->idevenement;
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeuredebut(): ?\DateTimeInterface
    {
        return $this->heuredebut;
    }

    public function setHeuredebut(\DateTimeInterface $heuredebut): self
    {
        $this->heuredebut = $heuredebut;

        return $this;
    }

    public function getHeurefin(): ?\DateTimeInterface
    {
        return $this->heurefin;
    }

    public function setHeurefin(\DateTimeInterface $heurefin): self
    {
        $this->heurefin = $heurefin;

        return $this;
    }

    public function getNbplaces(): ?int
    {
        return $this->nbplaces;
    }

    public function setNbplaces(int $nbplaces): self
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }

    public function getIdhackathon(): ?Hackathon
    {
        return $this->idhackathon;
    }

    public function setIdhackathon(?Hackathon $idhackathon): self
    {
        $this->idhackathon = $idhackathon;

        return $this;
    }

    public function getIdtypeevenement(): ?Typeevenement
    {
        return $this->idtypeevenement;
    }

    public function setIdtypeevenement(?Typeevenement $idtypeevenement): self
    {
        $this->idtypeevenement = $idtypeevenement;

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
