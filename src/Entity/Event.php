<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nameEvent = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateHourEvent = null;

    #[ORM\Column]
    private ?int $maxNbRegistrantEvent = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptionGameEvent = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pictureEvent = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $durationEvent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameEvent(): ?string
    {
        return $this->nameEvent;
    }

    public function setNameEvent(string $nameEvent): self
    {
        $this->nameEvent = $nameEvent;

        return $this;
    }

    public function getDateHourEvent(): ?\DateTimeInterface
    {
        return $this->dateHourEvent;
    }

    public function setDateHourEvent(\DateTimeInterface $dateHourEvent): self
    {
        $this->dateHourEvent = $dateHourEvent;

        return $this;
    }


    public function getMaxNbRegistrantEvent(): ?int
    {
        return $this->maxNbRegistrantEvent;
    }

    public function setMaxNbRegistrantEvent(int $maxNbRegistrantEvent): self
    {
        $this->maxNbRegistrantEvent = $maxNbRegistrantEvent;

        return $this;
    }

    public function getDescriptionGameEvent(): ?string
    {
        return $this->descriptionGameEvent;
    }

    public function setDescriptionGameEvent(string $descriptionGameEvent): self
    {
        $this->descriptionGameEvent = $descriptionGameEvent;

        return $this;
    }

    public function getPictureEvent(): ?string
    {
        return $this->pictureEvent;
    }

    public function setPictureEvent(?string $pictureEvent): self
    {
        $this->pictureEvent = $pictureEvent;

        return $this;
    }

    public function getDurationEvent(): ?\DateTimeInterface
    {
        return $this->durationEvent;
    }

    public function setDurationEvent(\DateTimeInterface $durationEvent): self
    {
        $this->durationEvent = $durationEvent;

        return $this;
    }
}
