<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participantevenement
 *
 * @ORM\Table(name="participantevenement", indexes={@ORM\Index(name="IdEvenement", columns={"IdEvenement"})})
 * @ORM\Entity
 */
class Participantevenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=128, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=128, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail", type="string", length=255, nullable=false)
     */
    private $mail;

    /**
     * @var \Evenement
     *
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdEvenement", referencedColumnName="IdEvenement")
     * })
     */
    private $idevenement;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getIdevenement()
    {
        return $this->idevenement;
    }

    public function setIdevenement(?Evenement $idevenement): self
    {
        $this->idevenement = $idevenement;

        return $this;
    }


}
