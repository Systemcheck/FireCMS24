<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190208173427 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dienstbuch (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, member VARCHAR(255) DEFAULT NULL, members LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', date DATE DEFAULT NULL, updated DATE DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, title VARCHAR(255) NOT NULL, trainer LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', startdate DATETIME NOT NULL, enddate DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE members (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, street VARCHAR(255) DEFAULT NULL, postcode VARCHAR(5) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, choice LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', executive INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE dienstbuch');
        $this->addSql('DROP TABLE members');
        $this->addSql('DROP TABLE user');
    }
}
