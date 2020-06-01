<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200528082618 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_54F1F40B2B36786B ON advert');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1D07ECCB6 FOREIGN KEY (advert_id) REFERENCES advert (id)');
        $this->addSql('DROP INDEX fk_a45bddc1d07eccb6 ON application');
        $this->addSql('CREATE INDEX IDX_A45BDDC1D07ECCB6 ON application (advert_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE UNIQUE INDEX UNIQ_54F1F40B2B36786B ON advert (title)');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC1D07ECCB6');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC1D07ECCB6');
        $this->addSql('DROP INDEX idx_a45bddc1d07eccb6 ON application');
        $this->addSql('CREATE INDEX FK_A45BDDC1D07ECCB6 ON application (advert_id)');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1D07ECCB6 FOREIGN KEY (advert_id) REFERENCES advert (id)');
    }
}
