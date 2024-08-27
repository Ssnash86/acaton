<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $anné_publication = null;

    #[ORM\Column]
    private ?int $nombre_page = null;

    #[ORM\Column(length: 100)]
    private ?string $langue = null;

    #[ORM\Column]
    private ?int $ISBN = null;

    #[ORM\Column]
    private ?int $eISBN = null;

    #[ORM\ManyToOne(inversedBy: 'livres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?auteur $auteur = null;

    #[ORM\ManyToOne(inversedBy: 'livres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?editeur $editeur = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $resume = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAnnéPublication(): ?\DateTimeInterface
    {
        return $this->anné_publication;
    }

    public function setAnnéPublication(\DateTimeInterface $anné_publication): static
    {
        $this->anné_publication = $anné_publication;

        return $this;
    }

    public function getNombrePage(): ?int
    {
        return $this->nombre_page;
    }

    public function setNombrePage(int $nombre_page): static
    {
        $this->nombre_page = $nombre_page;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): static
    {
        $this->langue = $langue;

        return $this;
    }

    public function getISBN(): ?int
    {
        return $this->ISBN;
    }

    public function setISBN(int $ISBN): static
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    public function getEISBN(): ?int
    {
        return $this->eISBN;
    }

    public function setEISBN(int $eISBN): static
    {
        $this->eISBN = $eISBN;

        return $this;
    }

    public function getAuteur(): ?auteur
    {
        return $this->auteur;
    }

    public function setAuteur(?auteur $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getEditeur(): ?editeur
    {
        return $this->editeur;
    }

    public function setEditeur(?editeur $editeur): static
    {
        $this->editeur = $editeur;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): static
    {
        $this->resume = $resume;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): static
    {
        $this->img = $img;

        return $this;
    }
}
