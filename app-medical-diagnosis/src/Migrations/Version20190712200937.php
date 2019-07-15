<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190712200937 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE favorite_drink (id INT AUTO_INCREMENT NOT NULL, takes_caffeinated_drinks TINYINT(1) DEFAULT NULL, takes_alcoholic_drinks TINYINT(1) DEFAULT NULL, takes_nothing_special TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE social_status (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, is_married TINYINT(1) DEFAULT NULL, is_divorced TINYINT(1) DEFAULT NULL, is_widow_or_widower TINYINT(1) DEFAULT NULL, is_in_concubinage TINYINT(1) DEFAULT NULL, is_single TINYINT(1) DEFAULT NULL, INDEX IDX_654B07C0A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habits (id INT AUTO_INCREMENT NOT NULL, smokes TINYINT(1) DEFAULT NULL, drinks TINYINT(1) DEFAULT NULL, sleeps_alot TINYINT(1) DEFAULT NULL, does_sport TINYINT(1) DEFAULT NULL, takes_medicaments TINYINT(1) DEFAULT NULL, is_exposed_to_chemicals TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favorite_breakfast (id INT AUTO_INCREMENT NOT NULL, takes_typical_french_brekfast TINYINT(1) DEFAULT NULL, takes_green_juices TINYINT(1) DEFAULT NULL, takes_porridge_or_muesli TINYINT(1) DEFAULT NULL, takes_fruits_mix TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE family_clinical_history (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE social_status ADD CONSTRAINT FK_654B07C0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE social_status DROP FOREIGN KEY FK_654B07C0A76ED395');
        $this->addSql('DROP TABLE favorite_drink');
        $this->addSql('DROP TABLE social_status');
        $this->addSql('DROP TABLE habits');
        $this->addSql('DROP TABLE favorite_breakfast');
        $this->addSql('DROP TABLE family_clinical_history');
        $this->addSql('DROP TABLE user');
    }
}
