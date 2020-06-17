<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200617150814 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE advert_user (advert_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C4B39704D07ECCB6 (advert_id), INDEX IDX_C4B39704A76ED395 (user_id), PRIMARY KEY(advert_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE advert_user ADD CONSTRAINT FK_C4B39704D07ECCB6 FOREIGN KEY (advert_id) REFERENCES advert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advert_user ADD CONSTRAINT FK_C4B39704A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advert CHANGE image_id image_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE advert_skill CHANGE advert_id advert_id INT DEFAULT NULL, CHANGE skill_id skill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE linkedin_username linkedin_username VARCHAR(255) DEFAULT NULL, CHANGE avatar_url avatar_url INT DEFAULT NULL, CHANGE siret siret INT DEFAULT NULL, CHANGE last_name last_name VARCHAR(255) DEFAULT NULL, CHANGE phone phone VARCHAR(10) DEFAULT NULL, CHANGE city city VARCHAR(40) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE advert_user');
        $this->addSql('ALTER TABLE advert CHANGE image_id image_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE advert_skill CHANGE advert_id advert_id INT DEFAULT NULL, CHANGE skill_id skill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE linkedin_username linkedin_username VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_general_ci`, CHANGE avatar_url avatar_url INT DEFAULT NULL, CHANGE siret siret INT DEFAULT NULL, CHANGE last_name last_name VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_general_ci`, CHANGE phone phone VARCHAR(10) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_general_ci`, CHANGE city city VARCHAR(40) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_general_ci`');
    }
}
