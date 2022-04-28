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
     * @var \Hackathon
     *
     * @ORM\ManyToOne(targetEntity="Hackathon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdHackathon", referencedColumnName="IdHackathon")
     * })
     */
    private $idhackathon;

    /**
     * @var \Participant
     *
     * @ORM\ManyToOne(targetEntity="Participant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdParticipant", referencedColumnName="IdParticipant")
     * })
     */
    private $idparticipant;

    public function getIdfavori(): ?int
    {
        return $this->idfavori;
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

    public function getIdparticipant(): ?Participant
    {
        return $this->idparticipant;
    }

    public function setIdparticipant(?Participant $idparticipant): self
    {
        $this->idparticipant = $idparticipant;

        return $this;
    }


}
