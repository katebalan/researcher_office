<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191113105001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE individual_work (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, individual_plan_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, hours DOUBLE PRECISION NOT NULL, tern_of_execution VARCHAR(255) NOT NULL, mark VARCHAR(255) NOT NULL, INDEX IDX_9B8CF233C54C8C93 (type_id), INDEX IDX_9B8CF233D1458316 (individual_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_work_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, canonical VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_plan (id INT AUTO_INCREMENT NOT NULL, years VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_plan_discipline (individual_plan_id INT NOT NULL, discipline_id INT NOT NULL, INDEX IDX_3741A3C7D1458316 (individual_plan_id), INDEX IDX_3741A3C7A5522701 (discipline_id), PRIMARY KEY(individual_plan_id, discipline_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE individual_work ADD CONSTRAINT FK_9B8CF233C54C8C93 FOREIGN KEY (type_id) REFERENCES individual_work_type (id)');
        $this->addSql('ALTER TABLE individual_work ADD CONSTRAINT FK_9B8CF233D1458316 FOREIGN KEY (individual_plan_id) REFERENCES individual_plan (id)');
        $this->addSql('ALTER TABLE individual_plan_discipline ADD CONSTRAINT FK_3741A3C7D1458316 FOREIGN KEY (individual_plan_id) REFERENCES individual_plan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_plan_discipline ADD CONSTRAINT FK_3741A3C7A5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE individual_work DROP FOREIGN KEY FK_9B8CF233C54C8C93');
        $this->addSql('ALTER TABLE individual_work DROP FOREIGN KEY FK_9B8CF233D1458316');
        $this->addSql('ALTER TABLE individual_plan_discipline DROP FOREIGN KEY FK_3741A3C7D1458316');
        $this->addSql('DROP TABLE individual_work');
        $this->addSql('DROP TABLE individual_work_type');
        $this->addSql('DROP TABLE individual_plan');
        $this->addSql('DROP TABLE individual_plan_discipline');
    }
}
