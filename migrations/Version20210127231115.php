<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210127231115 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE individual_plan ADD updated_by_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE individual_plan ADD CONSTRAINT FK_1598C1CE896DBBDE FOREIGN KEY (updated_by_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_1598C1CE896DBBDE ON individual_plan (updated_by_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE individual_plan DROP FOREIGN KEY FK_1598C1CE896DBBDE');
        $this->addSql('DROP INDEX IDX_1598C1CE896DBBDE ON individual_plan');
        $this->addSql('ALTER TABLE individual_plan DROP updated_by_id');
    }
}
