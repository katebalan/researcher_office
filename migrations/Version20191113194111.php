<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191113194111 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE individual_plan ADD created_by_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE individual_plan ADD CONSTRAINT FK_1598C1CEB03A8386 FOREIGN KEY (created_by_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_1598C1CEB03A8386 ON individual_plan (created_by_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE individual_plan DROP FOREIGN KEY FK_1598C1CEB03A8386');
        $this->addSql('DROP INDEX IDX_1598C1CEB03A8386 ON individual_plan');
        $this->addSql('ALTER TABLE individual_plan DROP created_by_id');
    }
}
