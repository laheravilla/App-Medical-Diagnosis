<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190725111104 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE api (id INT AUTO_INCREMENT NOT NULL, language VARCHAR(255) DEFAULT NULL, year_of_birth INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE issue (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, issue_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialisation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, specialisation_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE symptom (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, symptom_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, year_of_birth VARCHAR(255) NOT NULL, weight DOUBLE PRECISION DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, number_of_children INT NOT NULL, gender VARCHAR(255) NOT NULL, social_status VARCHAR(255) NOT NULL, habits TINYTEXT NOT NULL COMMENT \'(DC2Type:array)\', favorite_breakfast VARCHAR(255) NOT NULL, favorite_drink VARCHAR(255) NOT NULL, family_clinical_history TINYTEXT NOT NULL COMMENT \'(DC2Type:array)\', user_clinical_history TINYTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_symptom (user_id INT NOT NULL, symptom_id INT NOT NULL, INDEX IDX_BCCFEEAAA76ED395 (user_id), INDEX IDX_BCCFEEAADEEFDA95 (symptom_id), PRIMARY KEY(user_id, symptom_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_symptom ADD CONSTRAINT FK_BCCFEEAAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_symptom ADD CONSTRAINT FK_BCCFEEAADEEFDA95 FOREIGN KEY (symptom_id) REFERENCES symptom (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_symptom DROP FOREIGN KEY FK_BCCFEEAADEEFDA95');
        $this->addSql('ALTER TABLE user_symptom DROP FOREIGN KEY FK_BCCFEEAAA76ED395');
        $this->addSql('DROP TABLE api');
        $this->addSql('DROP TABLE issue');
        $this->addSql('DROP TABLE specialisation');
        $this->addSql('DROP TABLE symptom');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_symptom');
    }
}
