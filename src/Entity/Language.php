<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LanguageRepository::class)]
class Language
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nameLanguage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pictureLanguage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameLanguage(): ?string
    {
        return $this->nameLanguage;
    }

    public function setNameLanguage(string $nameLanguage): self
    {
        $this->nameLanguage = $nameLanguage;

        return $this;
    }

    public function getPictureLanguage(): ?string
    {
        return $this->pictureLanguage;
    }

    public function setPictureLanguage(?string $pictureLanguage): self
    {
        $this->pictureLanguage = $pictureLanguage;

        return $this;
    }
}
