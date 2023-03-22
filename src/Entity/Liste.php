<?php

namespace App\Entity;

use App\Repository\ListeRepository;
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
}
