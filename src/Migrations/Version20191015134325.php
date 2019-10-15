<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191015134325 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX id ON produit');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D96C8A81A9');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D9E1729BBA');
        $this->addSql('DROP INDEX UNIQ_CAC822D9E1729BBA ON price');
        $this->addSql('DROP INDEX UNIQ_CAC822D96C8A81A9 ON price');
        $this->addSql('ALTER TABLE price DROP products_id, DROP appartement_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE price ADD products_id INT DEFAULT NULL, ADD appartement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D96C8A81A9 FOREIGN KEY (products_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D9E1729BBA FOREIGN KEY (appartement_id) REFERENCES appartements (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CAC822D9E1729BBA ON price (appartement_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CAC822D96C8A81A9 ON price (products_id)');
        $this->addSql('CREATE INDEX id ON produit (id)');
    }
}
