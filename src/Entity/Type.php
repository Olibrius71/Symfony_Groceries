<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table(name="type")
 * @ORM\Entity
 */
class Type
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_type_art", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeArt;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_type_art", type="string", length=100, nullable=false)
     */
    private $nomTypeArt;




    /**
     * @return int
     */
    public function getIdTypeArt(): int
    {
        return $this->idTypeArt;
    }

    /**
     * @return string
     */
    public function getNomTypeArt(): string
    {
        return $this->nomTypeArt;
    }



    /**
     * @param int $idTypeArt
     */
    public function setIdTypeArt(int $idTypeArt): void
    {
        $this->idTypeArt = $idTypeArt;
    }

    /**
     * @param string $nomTypeArt
     */
    public function setNomTypeArt(string $nomTypeArt): void
    {
        $this->nomTypeArt = $nomTypeArt;
    }



    public function __toString() {
        return $this->nomTypeArt . " avec l'id " . $this->idTypeArt;
    }
}
