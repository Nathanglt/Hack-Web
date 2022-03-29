<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favori
 *
 * @ORM\Table(name="favori", indexes={@ORM\Index(name="Favori_ibfk_1", columns={"IdHackathon"}), @ORM\Index(name="Favori_ibfk_2", columns={"IdParticipant"})})
 * @ORM\Entity
 */
class Favori
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdFavori", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfavori;

    /**
     * @var int
     *
     * @ORM\Column(name="IdHackathon", type="integer", nullable=false)
     */
    private $idhackathon;

    /**
     * @var int
     *
     * @ORM\Column(name="IdParticipant", type="integer", nullable=false)
     */
    private $idparticipant;

    public function getIdfavori(): ?int
    {
        return $this->idfavori;
    }

    public function getIdhackathon(): ?int
    {
        return $this->idhackathon;
    }

    public function setIdhackathon(int $idhackathon): self
    {
        $this->idhackathon = $idhackathon;

        return $this;
    }

    public function getIdparticipant(): ?int
    {
        return $this->idparticipant;
    }

    public function setIdparticipant(int $idparticipant): self
    {
        $this->idparticipant = $idparticipant;

        return $this;
    }


}
