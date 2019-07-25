<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190725045327 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_symptom (user_id INT NOT NULL, symptom_id INT NOT NULL, INDEX IDX_BCCFEEAAA76ED395 (user_id), INDEX IDX_BCCFEEAADEEFDA95 (symptom_id), PRIMARY KEY(user_id, symptom_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_symptom ADD CONSTRAINT FK_BCCFEEAAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_symptom ADD CONSTRAINT FK_BCCFEEAADEEFDA95 FOREIGN KEY (symptom_id) REFERENCES symptom (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE symptom_user');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE symptom_user (symptom_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_8ECE5BA5DEEFDA95 (symptom_id), INDEX IDX_8ECE5BA5A76ED395 (user_id), PRIMARY KEY(symptom_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE symptom_user ADD CONSTRAINT FK_8ECE5BA5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE symptom_user ADD CONSTRAINT FK_8ECE5BA5DEEFDA95 FOREIGN KEY (symptom_id) REFERENCES symptom (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE user_symptom');
    }
}
