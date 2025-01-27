<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250127152352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__person AS SELECT id, name, last_name, adress FROM person');
        $this->addSql('DROP TABLE person');
        $this->addSql('CREATE TABLE person (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, batiment_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, CONSTRAINT FK_34DCD176D6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO person (id, name, last_name, adress) SELECT id, name, last_name, adress FROM __temp__person');
        $this->addSql('DROP TABLE __temp__person');
        $this->addSql('CREATE INDEX IDX_34DCD176D6F6891B ON person (batiment_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__person AS SELECT id, name, last_name, adress FROM person');
        $this->addSql('DROP TABLE person');
        $this->addSql('CREATE TABLE person (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO person (id, name, last_name, adress) SELECT id, name, last_name, adress FROM __temp__person');
        $this->addSql('DROP TABLE __temp__person');
    }
}
