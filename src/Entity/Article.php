<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nomArticle = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'articlesOfType')]
    private Collection $typeArticle;

    #[ORM\OneToMany(mappedBy: 'articleOfContient', targetEntity: Contient::class, orphanRemoval: true)]
    private Collection $contientsOfArticle;

    public function __construct()
    {
        $this->typeArticle = new ArrayCollection();
        $this->contientsOfArticle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomArticle(): ?string
    {
        return $this->nomArticle;
    }

    public function setNomArticle(string $nomArticle): self
    {
        $this->nomArticle = $nomArticle;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getTypeArticle(): Collection
    {
        return $this->typeArticle;
    }

    public function addTypeArticle(Type $typeArticle): self
    {
        if (!$this->typeArticle->contains($typeArticle)) {
            $this->typeArticle->add($typeArticle);
        }

        return $this;
    }

    public function removeTypeArticle(Type $typeArticle): self
    {
        $this->typeArticle->removeElement($typeArticle);

        return $this;
    }

    /**
     * @return Collection<int, Contient>
     */
    public function getContientsOfArticle(): Collection
    {
        return $this->contientsOfArticle;
    }

    public function addContientsOfArticle(Contient $contientsOfArticle): self
    {
        if (!$this->contientsOfArticle->contains($contientsOfArticle)) {
            $this->contientsOfArticle->add($contientsOfArticle);
            $contientsOfArticle->setArticleOfContient($this);
        }

        return $this;
    }

    public function removeContientsOfArticle(Contient $contientsOfArticle): self
    {
        if ($this->contientsOfArticle->removeElement($contientsOfArticle)) {
            // set the owning side to null (unless already changed)
            if ($contientsOfArticle->getArticleOfContient() === $this) {
                $contientsOfArticle->setArticleOfContient(null);
            }
        }

        return $this;
    }
}
