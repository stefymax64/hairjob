<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200617113333 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE advert_skills (advert_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_913D1F1ED07ECCB6 (advert_id), INDEX IDX_913D1F1E5585C142 (skill_id), PRIMARY KEY(advert_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE advert_levels (advert_source INT NOT NULL, advert_target INT NOT NULL, INDEX IDX_DB266D771B86761D (advert_source), INDEX IDX_DB266D772632692 (advert_target), PRIMARY KEY(advert_source, advert_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE advert_skills ADD CONSTRAINT FK_913D1F1ED07ECCB6 FOREIGN KEY (advert_id) REFERENCES advert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advert_skills ADD CONSTRAINT FK_913D1F1E5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advert_levels ADD CONSTRAINT FK_DB266D771B86761D FOREIGN KEY (advert_source) REFERENCES advert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advert_levels ADD CONSTRAINT FK_DB266D772632692 FOREIGN KEY (advert_target) REFERENCES advert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advert CHANGE image_id image_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE linkedin_username linkedin_username VARCHAR(255) DEFAULT NULL, CHANGE avatar_url avatar_url INT DEFAULT NULL, CHANGE siret siret INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE advert_skills');
        $this->addSql('DROP TABLE advert_levels');
        $this->addSql('ALTER TABLE advert CHANGE image_id image_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE linkedin_username linkedin_username VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_general_ci`, CHANGE avatar_url avatar_url INT DEFAULT NULL, CHANGE siret siret INT DEFAULT NULL');
    }
}
