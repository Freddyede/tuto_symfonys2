<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191014131751 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produces ADD users_id INT DEFAULT NULL, ADD img_size LONGTEXT NOT NULL, ADD price LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE produces ADD CONSTRAINT FK_E063794A67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E063794A67B3B43D ON produces (users_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produces DROP FOREIGN KEY FK_E063794A67B3B43D');
        $this->addSql('DROP INDEX IDX_E063794A67B3B43D ON produces');
        $this->addSql('ALTER TABLE produces DROP users_id, DROP img_size, DROP price');
    }
}
