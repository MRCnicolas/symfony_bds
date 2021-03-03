<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210303085812 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE editeur (id INT AUTO_INCREMENT NOT NULL, editeur VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, editeur_id INT NOT NULL, fournisseur VARCHAR(50) NOT NULL, INDEX IDX_369ECA323375BD21 (editeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, genre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA323375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
        $this->addSql('ALTER TABLE produit ADD genre_id INT NOT NULL, ADD fournisseur_id INT NOT NULL, ADD editeur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC274296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC273375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC274296D31F ON produit (genre_id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27670C757F ON produit (fournisseur_id)');
        $this->addSql('CREATE INDEX IDX_29A5EC273375BD21 ON produit (editeur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA323375BD21');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC273375BD21');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27670C757F');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC274296D31F');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP INDEX IDX_29A5EC274296D31F ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC27670C757F ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC273375BD21 ON produit');
        $this->addSql('ALTER TABLE produit DROP genre_id, DROP fournisseur_id, DROP editeur_id');
    }
}
