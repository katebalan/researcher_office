<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191024130148 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE discipline (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name LONGTEXT NOT NULL, duration DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_75BEEE3FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson_type (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL, nmae_canonical VARCHAR(255) NOT NULL, name_plural VARCHAR(255) NOT NULL, is_control TINYINT(1) NOT NULL, is_evaluated TINYINT(1) NOT NULL, default_hours DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, name LONGTEXT NOT NULL, hours DOUBLE PRECISION NOT NULL, evaluation_type VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_F87474F3C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE topic (id INT AUTO_INCREMENT NOT NULL, discipline_id INT NOT NULL, parent_topic_id INT DEFAULT NULL, name LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_9D40DE1BA5522701 (discipline_id), INDEX IDX_9D40DE1B80988CEC (parent_topic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE topic_lesson (topic_id INT NOT NULL, lesson_id INT NOT NULL, INDEX IDX_5B73472B1F55203D (topic_id), INDEX IDX_5B73472BCDF80196 (lesson_id), PRIMARY KEY(topic_id, lesson_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE discipline ADD CONSTRAINT FK_75BEEE3FA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3C54C8C93 FOREIGN KEY (type_id) REFERENCES lesson_type (id)');
        $this->addSql('ALTER TABLE topic ADD CONSTRAINT FK_9D40DE1BA5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id)');
        $this->addSql('ALTER TABLE topic ADD CONSTRAINT FK_9D40DE1B80988CEC FOREIGN KEY (parent_topic_id) REFERENCES topic (id)');
        $this->addSql('ALTER TABLE topic_lesson ADD CONSTRAINT FK_5B73472B1F55203D FOREIGN KEY (topic_id) REFERENCES topic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE topic_lesson ADD CONSTRAINT FK_5B73472BCDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scientific_interest CHANGE name name LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE scientific_rank CHANGE name name LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE scientific_degree CHANGE name name LONGTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE topic DROP FOREIGN KEY FK_9D40DE1BA5522701');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3C54C8C93');
        $this->addSql('ALTER TABLE topic_lesson DROP FOREIGN KEY FK_5B73472BCDF80196');
        $this->addSql('ALTER TABLE topic DROP FOREIGN KEY FK_9D40DE1B80988CEC');
        $this->addSql('ALTER TABLE topic_lesson DROP FOREIGN KEY FK_5B73472B1F55203D');
        $this->addSql('DROP TABLE discipline');
        $this->addSql('DROP TABLE lesson_type');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE topic');
        $this->addSql('DROP TABLE topic_lesson');
        $this->addSql('ALTER TABLE scientific_degree CHANGE name name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE scientific_interest CHANGE name name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE scientific_rank CHANGE name name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
