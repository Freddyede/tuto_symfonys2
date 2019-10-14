<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191014131906 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE produces');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE produces (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, img_produces LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, prices INT NOT NULL, titre LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, img_size LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, price LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_E063794A67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE produces ADD CONSTRAINT FK_E063794A67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
    }
}
