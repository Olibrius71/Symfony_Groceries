<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nomType = null;

    #[ORM\ManyToMany(targetEntity: Article::class, mappedBy: 'typeArticle')]
    private Collection $articlesOfType;

    public function __construct()
    {
        $this->articlesOfType = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Article>
     */
    public function getArticlesOfType(): Collection
    {
        return $this->articlesOfType;
    }

    public function addArticlesOfType(Article $articlesOfType): self
    {
        if (!$this->articlesOfType->contains($articlesOfType)) {
            $this->articlesOfType->add($articlesOfType);
            $articlesOfType->addTypeArticle($this);
        }

        return $this;
    }

    public function removeArticlesOfType(Article $articlesOfType): self
    {
        if ($this->articlesOfType->removeElement($articlesOfType)) {
            $articlesOfType->removeTypeArticle($this);
        }

        return $this;
    }
}
