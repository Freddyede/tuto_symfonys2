<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191015090138 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE appartements (id INT AUTO_INCREMENT NOT NULL, surface INT NOT NULL, type VARCHAR(2) NOT NULL, images LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE price ADD appartement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D9E1729BBA FOREIGN KEY (appartement_id) REFERENCES appartements (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CAC822D9E1729BBA ON price (appartement_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D9E1729BBA');
        $this->addSql('DROP TABLE appartements');
        $this->addSql('DROP INDEX UNIQ_CAC822D9E1729BBA ON price');
        $this->addSql('ALTER TABLE price DROP appartement_id');
    }
}
