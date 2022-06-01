<?php

namespace App\Entity;

use App\Repository\OeuvreThemeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OeuvreThemeRepository::class)]
class OeuvreTheme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: oeuvre::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $oeuvre;

    #[ORM\ManyToOne(targetEntity: theme::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $theme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOeuvre(): ?oeuvre
    {
        return $this->oeuvre;
    }

    public function setOeuvre(?oeuvre $oeuvre): self
    {
        $this->oeuvre = $oeuvre;

        return $this;
    }

    public function getTheme(): ?theme
    {
        return $this->theme;
    }

    public function setTheme(?theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }
}
