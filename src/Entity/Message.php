<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateHourMessage = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $textMessage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHourMessage(): ?\DateTimeInterface
    {
        return $this->dateHourMessage;
    }

    public function setDateHourMessage(\DateTimeInterface $dateHourMessage): self
    {
        $this->dateHourMessage = $dateHourMessage;

        return $this;
    }

    public function getTextMessage(): ?string
    {
        return $this->textMessage;
    }

    public function setTextMessage(string $textMessage): self
    {
        $this->textMessage = $textMessage;

        return $this;
    }
}
