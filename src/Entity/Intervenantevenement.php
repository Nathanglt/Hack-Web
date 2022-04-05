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
     * @var \Evenement
     *
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdEvenement", referencedColumnName="IdEvenement")
     * })
     */
    private $idevenement;

    /**
     * @var \Intervenant
     *
     * @ORM\ManyToOne(targetEntity="Intervenant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdIntervenant", referencedColumnName="IdIntervenant")
     * })
     */
    private $idintervenant;

    public function getIdie(): ?int
    {
        return $this->idie;
    }

    public function getIdevenement(): ?Evenement
    {
        return $this->idevenement;
    }

    public function setIdevenement(?Evenement $idevenement): self
    {
        $this->idevenement = $idevenement;

        return $this;
    }

    public function getIdintervenant(): ?Intervenant
    {
        return $this->idintervenant;
    }

    public function setIdintervenant(?Intervenant $idintervenant): self
    {
        $this->idintervenant = $idintervenant;

        return $this;
    }


}
