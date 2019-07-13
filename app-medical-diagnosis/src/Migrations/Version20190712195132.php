<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190712195132 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE social_status ADD is_married TINYINT(1) DEFAULT NULL, ADD is_divorced TINYINT(1) DEFAULT NULL, ADD is_widow_or_widower TINYINT(1) DEFAULT NULL, ADD is_in_concubinage TINYINT(1) DEFAULT NULL, ADD is_single TINYINT(1) DEFAULT NULL, DROP married, DROP divorced_orseparated, DROP widow_or_widower, DROP concubinage, DROP single');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE social_status ADD married VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD divorced_orseparated VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD widow_or_widower VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD concubinage VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD single VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP is_married, DROP is_divorced, DROP is_widow_or_widower, DROP is_in_concubinage, DROP is_single');
    }
}
