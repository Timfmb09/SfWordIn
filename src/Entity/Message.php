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

    #[ORM\ManyToOne(inversedBy: 'messagesSend')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userSender = null;

    #[ORM\ManyToOne(inversedBy: 'messagesReceipt')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userRecipient = null;

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

    public function getUserSender(): ?User
    {
        return $this->userSender;
    }

    public function setUserSender(?User $userSender): self
    {
        $this->userSender = $userSender;

        return $this;
    }

    public function getUserRecipient(): ?User
    {
        return $this->userRecipient;
    }

    public function setUserRecipient(?User $userRecipient): self
    {
        $this->userRecipient = $userRecipient;

        return $this;
    }
}
