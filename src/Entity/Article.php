<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="article_fk_type", columns={"id_type_art_from_article"})})
 * @ORM\Entity
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_article", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_article", type="string", length=100, nullable=false)
     */
    private $nomArticle;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_article", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixArticle;

    /**
     * @var \Type
     *
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_art_from_article", referencedColumnName="id_type_art")
     * })
     */
    private $idTypeArtFromArticle;


    /**
     * @return int
     */
    public function getIdArticle(): int
    {
        return $this->idArticle;
    }

    /**
     * @return string
     */
    public function getNomArticle(): string
    {
        return $this->nomArticle;
    }

    /**
     * @return float
     */
    public function getPrixArticle(): float
    {
        return $this->prixArticle;
    }

    /**
     * @return \Type
     */
    public function getIdTypeArtFromArticle(): \Type
    {
        return $this->idTypeArtFromArticle;
    }


    /**
     * @param int $idArticle
     */
    public function setIdArticle(int $idArticle): void
    {
        $this->idArticle = $idArticle;
    }

    /**
     * @param string $nomArticle
     */
    public function setNomArticle(string $nomArticle): void
    {
        $this->nomArticle = $nomArticle;
    }

    /**
     * @param float $prixArticle
     */
    public function setPrixArticle(float $prixArticle): void
    {
        $this->prixArticle = $prixArticle;
    }

    /**
     * @param \Type $idTypeArtFromArticle
     */
    public function setIdTypeArtFromArticle(\Type $idTypeArtFromArticle): void
    {
        $this->idTypeArtFromArticle = $idTypeArtFromArticle;
    }



    public function __toString() {
        return $this->nomArticle . " qui coûte ". $this->prixArticle . "€ avec l'id " . $this->idArticle;
    }
}
