<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260302105625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE albums (id INT AUTO_INCREMENT NOT NULL, artist_id INT NOT NULL, title VARCHAR(255) NOT NULL, cover_url VARCHAR(255) NOT NULL, release_date DATE NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, bio VARCHAR(255) NOT NULL, image_url VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE listening_history (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, track_id INT NOT NULL, played_at DATETIME NOT NULL, ms_played INT NOT NULL, device VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE playlist_tracks (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, playlist_id INT NOT NULL, track_id INT NOT NULL, position INT NOT NULL, added_by_user_id INT NOT NULL, added_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE playlists (id INT AUTO_INCREMENT NOT NULL, owner_user_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, cover_url VARCHAR(255) NOT NULL, is_public TINYINT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE track_artists (id INT AUTO_INCREMENT NOT NULL, track_id INT NOT NULL, artist_id INT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tracks (id INT AUTO_INCREMENT NOT NULL, album_id INT NOT NULL, primary_artist_id INT NOT NULL, title VARCHAR(255) NOT NULL, duration_ms INT NOT NULL, audio_url VARCHAR(255) NOT NULL, track_number INT NOT NULL, explicit TINYINT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user_liked_tracks (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, track_id INT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, display_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE albums');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE listening_history');
        $this->addSql('DROP TABLE playlist_tracks');
        $this->addSql('DROP TABLE playlists');
        $this->addSql('DROP TABLE track_artists');
        $this->addSql('DROP TABLE tracks');
        $this->addSql('DROP TABLE user_liked_tracks');
        $this->addSql('DROP TABLE users');
    }
}
