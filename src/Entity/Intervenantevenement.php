<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intervenantevenement
 *
 * @ORM\Table(name="intervenantevenement", indexes={@ORM\Index(name="Intervenantevenement_ibfk_1", columns={"IdIntervenant"}), @ORM\Index(name="Intervenantevenement_ibfk_2", columns={"IdEvenement"})})
 * @ORM\Entity
 */
class Intervenantevenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdIE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idie;

    /**
     * @var int
     *
     * @ORM\Column(name="IdIntervenant", type="integer", nullable=false)
     */
    private $idintervenant;

    /**
     * @var int
     *
     * @ORM\Column(name="IdEvenement", type="integer", nullable=false)
     */
    private $idevenement;

    public function getIdie(): ?int
    {
        return $this->idie;
    }

    public function getIdintervenant(): ?int
    {
        return $this->idintervenant;
    }

    public function setIdintervenant(int $idintervenant): self
    {
        $this->idintervenant = $idintervenant;

        return $this;
    }

    public function getIdevenement(): ?int
    {
        return $this->idevenement;
    }

    public function setIdevenement(int $idevenement): self
    {
        $this->idevenement = $idevenement;

        return $this;
    }


}
