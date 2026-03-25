<?php

namespace App\Entity;

use App\Repository\ListeningHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListeningHistoryRepository::class)]
#[ORM\Table(name: 'listening_history')]
class ListeningHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column]
    private ?int $track_id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $played_at = null;

    #[ORM\Column]
    private ?int $ms_played = null;

    #[ORM\Column(length: 255)]
    private ?string $device = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getTrackId(): ?int
    {
        return $this->track_id;
    }

    public function setTrackId(int $track_id): static
    {
        $this->track_id = $track_id;

        return $this;
    }

    public function getPlayedAt(): ?\DateTimeImmutable
    {
        return $this->played_at;
    }

    public function setPlayedAt(\DateTimeImmutable $played_at): static
    {
        $this->played_at = $played_at;

        return $this;
    }

    public function getMsPlayed(): ?int
    {
        return $this->ms_played;
    }

    public function setMsPlayed(int $ms_played): static
    {
        $this->ms_played = $ms_played;

        return $this;
    }

    public function getDevice(): ?string
    {
        return $this->device;
    }

    public function setDevice(string $device): static
    {
        $this->device = $device;

        return $this;
    }
}
