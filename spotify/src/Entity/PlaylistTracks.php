<?php

namespace App\Entity;

use App\Repository\PlaylistTracksRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaylistTracksRepository::class)]
class PlaylistTracks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?int $playlist_id = null;

    #[ORM\Column]
    private ?int $track_id = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\Column]
    private ?int $added_by_user_id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $added_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getPlaylistId(): ?int
    {
        return $this->playlist_id;
    }

    public function setPlaylistId(int $playlist_id): static
    {
        $this->playlist_id = $playlist_id;

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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getAddedByUserId(): ?int
    {
        return $this->added_by_user_id;
    }

    public function setAddedByUserId(int $added_by_user_id): static
    {
        $this->added_by_user_id = $added_by_user_id;

        return $this;
    }

    public function getAddedAt(): ?\DateTimeImmutable
    {
        return $this->added_at;
    }

    public function setAddedAt(\DateTimeImmutable $added_at): static
    {
        $this->added_at = $added_at;

        return $this;
    }
}
