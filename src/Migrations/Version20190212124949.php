<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190212124949 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE widgets (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, modname VARCHAR(255) NOT NULL, active TINYINT(1) DEFAULT NULL, info LONGTEXT DEFAULT NULL, author VARCHAR(255) DEFAULT NULL, pathinfo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dienstbuch DROP date, CHANGE member member LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE widgets');
        $this->addSql('ALTER TABLE dienstbuch ADD date DATE DEFAULT NULL, CHANGE member member VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
