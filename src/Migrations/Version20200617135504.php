<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200617135504 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE advert CHANGE image_id image_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE advert_levels DROP FOREIGN KEY FK_DB266D771B86761D');
        $this->addSql('ALTER TABLE advert_levels DROP FOREIGN KEY FK_DB266D772632692');
        $this->addSql('DROP INDEX IDX_DB266D772632692 ON advert_levels');
        $this->addSql('DROP INDEX IDX_DB266D771B86761D ON advert_levels');
        $this->addSql('ALTER TABLE advert_levels DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE advert_levels ADD advert_id INT NOT NULL, ADD advert_skill_id INT NOT NULL, DROP advert_source, DROP advert_target');
        $this->addSql('ALTER TABLE advert_levels ADD CONSTRAINT FK_DB266D77D07ECCB6 FOREIGN KEY (advert_id) REFERENCES advert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advert_levels ADD CONSTRAINT FK_DB266D77D7277BC3 FOREIGN KEY (advert_skill_id) REFERENCES advert_skill (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_DB266D77D07ECCB6 ON advert_levels (advert_id)');
        $this->addSql('CREATE INDEX IDX_DB266D77D7277BC3 ON advert_levels (advert_skill_id)');
        $this->addSql('ALTER TABLE advert_levels ADD PRIMARY KEY (advert_id, advert_skill_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE linkedin_username linkedin_username VARCHAR(255) DEFAULT NULL, CHANGE avatar_url avatar_url INT DEFAULT NULL, CHANGE siret siret INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE advert CHANGE image_id image_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE advert_levels DROP FOREIGN KEY FK_DB266D77D07ECCB6');
        $this->addSql('ALTER TABLE advert_levels DROP FOREIGN KEY FK_DB266D77D7277BC3');
        $this->addSql('DROP INDEX IDX_DB266D77D07ECCB6 ON advert_levels');
        $this->addSql('DROP INDEX IDX_DB266D77D7277BC3 ON advert_levels');
        $this->addSql('ALTER TABLE advert_levels DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE advert_levels ADD advert_source INT NOT NULL, ADD advert_target INT NOT NULL, DROP advert_id, DROP advert_skill_id');
        $this->addSql('ALTER TABLE advert_levels ADD CONSTRAINT FK_DB266D771B86761D FOREIGN KEY (advert_source) REFERENCES advert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advert_levels ADD CONSTRAINT FK_DB266D772632692 FOREIGN KEY (advert_target) REFERENCES advert (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_DB266D772632692 ON advert_levels (advert_target)');
        $this->addSql('CREATE INDEX IDX_DB266D771B86761D ON advert_levels (advert_source)');
        $this->addSql('ALTER TABLE advert_levels ADD PRIMARY KEY (advert_source, advert_target)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE linkedin_username linkedin_username VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_general_ci`, CHANGE avatar_url avatar_url INT DEFAULT NULL, CHANGE siret siret INT DEFAULT NULL');
    }
}
