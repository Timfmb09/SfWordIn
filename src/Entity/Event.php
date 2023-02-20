<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Place $place = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Language $language = null;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Comment::class, orphanRemoval: true)]
    private Collection $comments;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'events')]
    private Collection $usersAttendees;

    #[ORM\ManyToOne(inversedBy: 'eventsCreated')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userCreator = null;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->usersAttendees = new ArrayCollection();
    }

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

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setEvent($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getEvent() === $this) {
                $comment->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsersAttendees(): Collection
    {
        return $this->usersAttendees;
    }

    public function addUsersAttendee(User $usersAttendee): self
    {
        if (!$this->usersAttendees->contains($usersAttendee)) {
            $this->usersAttendees->add($usersAttendee);
        }

        return $this;
    }

    public function removeUsersAttendee(User $usersAttendee): self
    {
        $this->usersAttendees->removeElement($usersAttendee);

        return $this;
    }

    public function getuserCreator(): ?User
    {
        return $this->userCreator;
    }

    public function setuserCreator(?User $userCreator): self
    {
        $this->userCreator = $userCreator;

        return $this;
    }

    public function __toString()
    {
        return $this->nameEvent." ".$this->dateHourEvent->format('d/m/Y')." ".$this->durationEvent->format('H:i:s')." ".$this->maxNbRegistrantEvent." ".$this->descriptionGameEvent." ".$this->userCreator." ".$this->usersAttendees;
    }
}
