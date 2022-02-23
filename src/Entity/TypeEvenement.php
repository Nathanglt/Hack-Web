<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typeevenement
 *
 * @ORM\Table(name="typeevenement")
 * @ORM\Entity
 */
class Typeevenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdType", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtype;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom type", type="string", length=256, nullable=false)
     */
    private $nomType;

    public function getIdtype(): ?int
    {
        return $this->idtype;
    }

    public function getNomType(): ?string
    {
        return $this->nomType;
    }

    public function setNomType(string $nomType): self
    {
        $this->nomType = $nomType;

        return $this;
    }


}
