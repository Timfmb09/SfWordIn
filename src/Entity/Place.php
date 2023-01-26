<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $namePlace = null;

    #[ORM\Column(length: 255)]
    private ?string $adressPlace = null;

    #[ORM\Column(length: 50)]
    private ?string $cpPlace = null;

    #[ORM\Column(length: 50)]
    private ?string $cityPlace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picturePlace = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionPlace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $urlPlace = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamePlace(): ?string
    {
        return $this->namePlace;
    }

    public function setNamePlace(string $namePlace): self
    {
        $this->namePlace = $namePlace;

        return $this;
    }

    public function getAdressPlace(): ?string
    {
        return $this->adressPlace;
    }

    public function setAdressPlace(string $adressPlace): self
    {
        $this->adressPlace = $adressPlace;

        return $this;
    }

    public function getCpPlace(): ?string
    {
        return $this->cpPlace;
    }

    public function setCpPlace(string $cpPlace): self
    {
        $this->cpPlace = $cpPlace;

        return $this;
    }

    public function getCityPlace(): ?string
    {
        return $this->cityPlace;
    }

    public function setCityPlace(string $cityPlace): self
    {
        $this->cityPlace = $cityPlace;

        return $this;
    }

    public function getPicturePlace(): ?string
    {
        return $this->picturePlace;
    }

    public function setPicturePlace(?string $picturePlace): self
    {
        $this->picturePlace = $picturePlace;

        return $this;
    }

    public function getDescriptionPlace(): ?string
    {
        return $this->descriptionPlace;
    }

    public function setDescriptionPlace(?string $descriptionPlace): self
    {
        $this->descriptionPlace = $descriptionPlace;

        return $this;
    }

    public function getUrlPlace(): ?string
    {
        return $this->urlPlace;
    }

    public function setUrlPlace(?string $urlPlace): self
    {
        $this->urlPlace = $urlPlace;

        return $this;
    }
}
