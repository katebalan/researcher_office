<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191119114621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE individual_plan_discipline2 (individual_plan_id INT NOT NULL, discipline_id INT NOT NULL, INDEX IDX_1FE2A8BDD1458316 (individual_plan_id), INDEX IDX_1FE2A8BDA5522701 (discipline_id), PRIMARY KEY(individual_plan_id, discipline_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE individual_plan_discipline2 ADD CONSTRAINT FK_1FE2A8BDD1458316 FOREIGN KEY (individual_plan_id) REFERENCES individual_plan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_plan_discipline2 ADD CONSTRAINT FK_1FE2A8BDA5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE individual_plan_discipline2');
    }
}
