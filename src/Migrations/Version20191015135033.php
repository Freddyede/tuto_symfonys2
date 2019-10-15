<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191015135033 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE price_appartements');
        $this->addSql('DROP TABLE price_produit');
        $this->addSql('ALTER TABLE price ADD products_id INT DEFAULT NULL, ADD appartement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D96C8A81A9 FOREIGN KEY (products_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D9E1729BBA FOREIGN KEY (appartement_id) REFERENCES appartements (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CAC822D96C8A81A9 ON price (products_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CAC822D9E1729BBA ON price (appartement_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE price_appartements (price_id INT NOT NULL, appartements_id INT NOT NULL, INDEX IDX_7CA5FA36D614C7E7 (price_id), INDEX IDX_7CA5FA36CC24952C (appartements_id), PRIMARY KEY(price_id, appartements_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE price_produit (price_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_4283247BD614C7E7 (price_id), INDEX IDX_4283247BF347EFB (produit_id), PRIMARY KEY(price_id, produit_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE price_appartements ADD CONSTRAINT FK_7CA5FA36CC24952C FOREIGN KEY (appartements_id) REFERENCES appartements (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE price_appartements ADD CONSTRAINT FK_7CA5FA36D614C7E7 FOREIGN KEY (price_id) REFERENCES price (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE price_produit ADD CONSTRAINT FK_4283247BD614C7E7 FOREIGN KEY (price_id) REFERENCES price (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE price_produit ADD CONSTRAINT FK_4283247BF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D96C8A81A9');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D9E1729BBA');
        $this->addSql('DROP INDEX UNIQ_CAC822D96C8A81A9 ON price');
        $this->addSql('DROP INDEX UNIQ_CAC822D9E1729BBA ON price');
        $this->addSql('ALTER TABLE price DROP products_id, DROP appartement_id');
    }
}
