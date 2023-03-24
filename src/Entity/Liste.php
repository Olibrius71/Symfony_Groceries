<?php

namespace App\Entity;

use App\Repository\ListeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListeRepository::class)]
class Liste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nomListe = null;

    #[ORM\OneToMany(mappedBy: 'listOfContient', targetEntity: Contient::class, orphanRemoval: true)]
    private Collection $contenus;

    public function __construct()
    {
        $this->contenus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomListe(): ?string
    {
        return $this->nomListe;
    }

    public function setNomListe(string $nomListe): self
    {
        $this->nomListe = $nomListe;

        return $this;
    }

    /**
     * @return Collection<int, Contient>
     */
    public function getContenus(): Collection
    {
        return $this->contenus;
    }

    public function addContenu(Contient $contenu): self
    {
        if (!$this->contenus->contains($contenu)) {
            $this->contenus->add($contenu);
            $contenu->setListOfContient($this);
        }

        return $this;
    }

    public function removeContenu(Contient $contenu): self
    {
        if ($this->contenus->removeElement($contenu)) {
            // set the owning side to null (unless already changed)
            if ($contenu->getListOfContient() === $this) {
                $contenu->setListOfContient(null);
            }
        }

        return $this;
    }
}
