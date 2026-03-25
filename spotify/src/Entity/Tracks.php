<?php

namespace App\Entity;

use App\Repository\TracksRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TracksRepository::class)]
class Tracks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $album_id = null;

    #[ORM\Column]
    private ?int $primary_artist_id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $duration_ms = null;

    #[ORM\Column(length: 255)]
    private ?string $audio_url = null;

    #[ORM\Column]
    private ?int $track_number = null;

    #[ORM\Column]
    private ?bool $explicit = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlbumId(): ?int
    {
        return $this->album_id;
    }

    public function setAlbumId(int $album_id): static
    {
        $this->album_id = $album_id;

        return $this;
    }

    public function getPrimaryArtistId(): ?int
    {
        return $this->primary_artist_id;
    }

    public function setPrimaryArtistId(int $primary_artist_id): static
    {
        $this->primary_artist_id = $primary_artist_id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDurationMs(): ?int
    {
        return $this->duration_ms;
    }

    public function setDurationMs(int $duration_ms): static
    {
        $this->duration_ms = $duration_ms;

        return $this;
    }

    public function getAudioUrl(): ?string
    {
        return $this->audio_url;
    }

    public function setAudioUrl(string $audio_url): static
    {
        $this->audio_url = $audio_url;

        return $this;
    }

    public function getTrackNumber(): ?int
    {
        return $this->track_number;
    }

    public function setTrackNumber(int $track_number): static
    {
        $this->track_number = $track_number;

        return $this;
    }

    public function isExplicit(): ?bool
    {
        return $this->explicit;
    }

    public function setExplicit(bool $explicit): static
    {
        $this->explicit = $explicit;

        return $this;
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
}
