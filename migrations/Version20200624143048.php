<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200624143048 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, place_id INT NOT NULL, slug VARCHAR(255) NOT NULL, content VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_3AF34668DA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, set_at DATE NOT NULL, langue VARCHAR(255) NOT NULL, nb INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668DA6A219 FOREIGN KEY (place_id) REFERENCES places (id)');
        $this->addSql('ALTER TABLE places ADD reservation_id INT NOT NULL');
        $this->addSql('ALTER TABLE places ADD CONSTRAINT FK_FEAF6C55B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_FEAF6C55B83297E7 ON places (reservation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE places DROP FOREIGN KEY FK_FEAF6C55B83297E7');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP INDEX IDX_FEAF6C55B83297E7 ON places');
        $this->addSql('ALTER TABLE places DROP reservation_id');
    }
}
