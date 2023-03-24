<?php

namespace App\Entity;

use App\Repository\ContientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContientRepository::class)]
class Contient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $quantite = null;

    #[ORM\Column]
    private ?float $prixTotal = null;

    #[ORM\Column(nullable: true)]
    private ?bool $achete = null;

    #[ORM\ManyToOne(inversedBy: 'contenus')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Liste $listOfContient = null;

    #[ORM\ManyToOne(inversedBy: 'contientsOfArticle')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Article $articleOfContient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?float
    {
        return $this->quantite;
    }

    public function setQuantite(float $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixTotal(): ?float
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(float $prixTotal): self
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    public function isAchete(): ?bool
    {
        return $this->achete;
    }

    public function setAchete(?bool $achete): self
    {
        $this->achete = $achete;

        return $this;
    }

    public function getListOfContient(): ?Liste
    {
        return $this->listOfContient;
    }

    public function setListOfContient(?Liste $listOfContient): self
    {
        $this->listOfContient = $listOfContient;

        return $this;
    }

    public function getArticleOfContient(): ?Article
    {
        return $this->articleOfContient;
    }

    public function setArticleOfContient(?Article $articleOfContient): self
    {
        $this->articleOfContient = $articleOfContient;

        return $this;
    }
}
