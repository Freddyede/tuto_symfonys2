<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191015134410 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE price_produit (price_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_4283247BD614C7E7 (price_id), INDEX IDX_4283247BF347EFB (produit_id), PRIMARY KEY(price_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price_appartements (price_id INT NOT NULL, appartements_id INT NOT NULL, INDEX IDX_7CA5FA36D614C7E7 (price_id), INDEX IDX_7CA5FA36CC24952C (appartements_id), PRIMARY KEY(price_id, appartements_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE price_produit ADD CONSTRAINT FK_4283247BD614C7E7 FOREIGN KEY (price_id) REFERENCES price (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE price_produit ADD CONSTRAINT FK_4283247BF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE price_appartements ADD CONSTRAINT FK_7CA5FA36D614C7E7 FOREIGN KEY (price_id) REFERENCES price (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE price_appartements ADD CONSTRAINT FK_7CA5FA36CC24952C FOREIGN KEY (appartements_id) REFERENCES appartements (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE price_produit');
        $this->addSql('DROP TABLE price_appartements');
    }
}
