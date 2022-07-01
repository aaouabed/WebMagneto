<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615121334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE result (id INT AUTO_INCREMENT NOT NULL, object_id INT DEFAULT NULL, object_name VARCHAR(255) DEFAULT NULL, object_confidence INT DEFAULT NULL, object_position_x INT DEFAULT NULL, object_position_y INT DEFAULT NULL, object_width INT DEFAULT NULL, object_height INT DEFAULT NULL, object_size INT DEFAULT NULL, camera_url VARCHAR(255) DEFAULT NULL, camera_focal INT DEFAULT NULL, camera_sensor_width INT DEFAULT NULL, camera_sensor_length INT DEFAULT NULL, camera_position INT DEFAULT NULL, timestamp VARCHAR(255) DEFAULT NULL, object_dominant_colors_1 INT DEFAULT NULL, object_dominant_color_2 INT DEFAULT NULL, object_dominant_colors_3 INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE result');
        $this->addSql('DROP TABLE utilisateur');
    }
}
