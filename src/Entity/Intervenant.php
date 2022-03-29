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
     * @var int
     *
     * @ORM\Column(name="Nom", type="integer", nullable=false)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="Prenom", type="integer", nullable=false)
     */
    private $prenom;

    /**
     * @var int
     *
     * @ORM\Column(name="Mail", type="integer", nullable=false)
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

    public function getNom(): ?int
    {
        return $this->nom;
    }

    public function setNom(int $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?int
    {
        return $this->prenom;
    }

    public function setPrenom(int $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?int
    {
        return $this->mail;
    }

    public function setMail(int $mail): self
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
