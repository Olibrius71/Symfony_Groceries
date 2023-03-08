<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Liste
 *
 * @ORM\Table(name="liste")
 * @ORM\Entity
 */
class Liste
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_liste", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idListe;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_liste", type="string", length=100, nullable=false)
     */
    private $nomListe;





    /**
     * @return int
     */
    public function getIdListe(): int
    {
        return $this->idListe;
    }

    /**
     * @return string
     */
    public function getNomListe(): string
    {
        return $this->nomListe;
    }


    /**
     * @param int $idListe
     */
    public function setIdListe(int $idListe): void
    {
        $this->idListe = $idListe;
    }

    /**
     * @param string $nomListe
     */
    public function setNomListe(string $nomListe): void
    {
        $this->nomListe = $nomListe;
    }



    public function __toString() {
        return $this->nomListe . " avec l'id " . $this->idListe;
    }
}
