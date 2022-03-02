<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participation
 *
 * @ORM\Table(name="participation", indexes={@ORM\Index(name="IdParticipant", columns={"IdParticipant"}), @ORM\Index(name="Participation_ibfk_1", columns={"IdHackathon"})})
 * @ORM\Entity
 */
class Participation
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdParticipation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idparticipation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateInscription", type="date", nullable=false)
     */
    private $dateinscription;

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

    public function getIdparticipation(): ?int
    {
        return $this->idparticipation;
    }

    public function getDateinscription(): ?\DateTimeInterface
    {
        return $this->dateinscription;
    }

    public function setDateinscription(\DateTimeInterface $dateinscription): self
    {
        $this->dateinscription = $dateinscription;

        return $this;
    }

    public function getIdhackathon()
    {
        return $this->idhackathon;
    }

    public function setIdhackathon(?Hackathon $idhackathon): self
    {
        $this->idhackathon = $idhackathon;

        return $this;
    }

    public function getIdparticipant()
    {
        return $this->idparticipant;
    }

    public function setIdparticipant(?Participant $idparticipant): self
    {
        $this->idparticipant = $idparticipant;

        return $this;
    }


}