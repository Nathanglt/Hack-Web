<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intervenant
 *
 * @ORM\Table(name="intervenant")
 * @ORM\Entity
 */
class Intervenant
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdIntervenant", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idintervenant;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=256, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=256, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail", type="string", length=256, nullable=false)
     */
    private $mail;

    /**
     * @var int
     *
     * @ORM\Column(name="Telephone", type="integer", nullable=false)
     */
    private $telephone;

    public function getIdintervenant(): ?int
    {
        return $this->idintervenant;
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

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }


}
