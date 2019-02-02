<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190202180816 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE customers DROP FOREIGN KEY FK_62534E213E4A79C1');
        $this->addSql('DROP TABLE customers');
        $this->addSql('ALTER TABLE account DROP ftp');
        $this->addSql('ALTER TABLE user ADD password VARCHAR(100) DEFAULT NULL, DROP phone_number, CHANGE name name VARCHAR(100) DEFAULT NULL, CHANGE email email VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE customers (id INT AUTO_INCREMENT NOT NULL, password_id INT NOT NULL, name VARCHAR(60) NOT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, account VARCHAR(200) DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_62534E213E4A79C1 (password_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE customers ADD CONSTRAINT FK_62534E213E4A79C1 FOREIGN KEY (password_id) REFERENCES customers (id)');
        $this->addSql('ALTER TABLE account ADD ftp VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user ADD phone_number BIGINT DEFAULT NULL, DROP password, CHANGE name name VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
