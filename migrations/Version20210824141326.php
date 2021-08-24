<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210824141326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE education (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, name VARCHAR(255) NOT NULL, date_start DATE NOT NULL, date_end DATE DEFAULT NULL, website_url VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, INDEX IDX_DB0A5ED2C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE education_skill (education_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_E2B1FED02CA1BD71 (education_id), INDEX IDX_E2B1FED05585C142 (skill_id), PRIMARY KEY(education_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE education_type (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, ordering INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug LONGTEXT DEFAULT NULL, github_link VARCHAR(255) DEFAULT NULL, reading_time INT DEFAULT NULL, website_url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_skill (project_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_4D68EDE9166D1F9C (project_id), INDEX IDX_4D68EDE95585C142 (skill_id), PRIMARY KEY(project_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, first_interaction_date DATE NOT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE education ADD CONSTRAINT FK_DB0A5ED2C54C8C93 FOREIGN KEY (type_id) REFERENCES education_type (id)');
        $this->addSql('ALTER TABLE education_skill ADD CONSTRAINT FK_E2B1FED02CA1BD71 FOREIGN KEY (education_id) REFERENCES education (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE education_skill ADD CONSTRAINT FK_E2B1FED05585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_skill ADD CONSTRAINT FK_4D68EDE9166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_skill ADD CONSTRAINT FK_4D68EDE95585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE education_skill DROP FOREIGN KEY FK_E2B1FED02CA1BD71');
        $this->addSql('ALTER TABLE education DROP FOREIGN KEY FK_DB0A5ED2C54C8C93');
        $this->addSql('ALTER TABLE project_skill DROP FOREIGN KEY FK_4D68EDE9166D1F9C');
        $this->addSql('ALTER TABLE education_skill DROP FOREIGN KEY FK_E2B1FED05585C142');
        $this->addSql('ALTER TABLE project_skill DROP FOREIGN KEY FK_4D68EDE95585C142');
        $this->addSql('DROP TABLE education');
        $this->addSql('DROP TABLE education_skill');
        $this->addSql('DROP TABLE education_type');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_skill');
        $this->addSql('DROP TABLE skill');
    }
}
