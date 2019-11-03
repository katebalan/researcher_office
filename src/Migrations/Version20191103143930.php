<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191103143930 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE diploma (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name LONGTEXT NOT NULL, author VARCHAR(255) NOT NULL, date DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, filename VARCHAR(255) DEFAULT NULL, real_filename VARCHAR(255) DEFAULT NULL, INDEX IDX_EC218957A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson_type (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL, name_canonical VARCHAR(255) NOT NULL, name_plural VARCHAR(255) NOT NULL, is_control TINYINT(1) NOT NULL, is_evaluated TINYINT(1) NOT NULL, default_hours DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scientific_rank (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL, short_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, scientific_rank_id INT DEFAULT NULL, scientific_degree_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, second_name VARCHAR(255) NOT NULL, birth_date DATETIME NOT NULL, email VARCHAR(255) NOT NULL, patronymic VARCHAR(255) DEFAULT NULL, birth_place VARCHAR(255) DEFAULT NULL, education VARCHAR(255) DEFAULT NULL, biography LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_957A6479F85E0677 (username), UNIQUE INDEX UNIQ_957A6479E7927C74 (email), INDEX IDX_957A6479EEF8FFC5 (scientific_rank_id), INDEX IDX_957A6479471E7341 (scientific_degree_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_scientific_interest (user_id INT NOT NULL, scientific_interest_id INT NOT NULL, INDEX IDX_D06C3303A76ED395 (user_id), INDEX IDX_D06C330363156B8C (scientific_interest_id), PRIMARY KEY(user_id, scientific_interest_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL, co_authors_simple LONGTEXT DEFAULT NULL, place LONGTEXT DEFAULT NULL, date DATETIME NOT NULL, pages VARCHAR(255) DEFAULT NULL, notes LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, filename VARCHAR(255) DEFAULT NULL, real_filename VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication_user (publication_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_866B578438B217A7 (publication_id), INDEX IDX_866B5784A76ED395 (user_id), PRIMARY KEY(publication_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, name LONGTEXT NOT NULL, hours DOUBLE PRECISION NOT NULL, evaluation_type VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_F87474F3C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scientific_degree (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL, short_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discipline (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name LONGTEXT NOT NULL, duration DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_75BEEE3FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE topic (id INT AUTO_INCREMENT NOT NULL, discipline_id INT NOT NULL, parent_topic_id INT DEFAULT NULL, name LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_9D40DE1BA5522701 (discipline_id), INDEX IDX_9D40DE1B80988CEC (parent_topic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE topic_lesson (topic_id INT NOT NULL, lesson_id INT NOT NULL, INDEX IDX_5B73472B1F55203D (topic_id), INDEX IDX_5B73472BCDF80196 (lesson_id), PRIMARY KEY(topic_id, lesson_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scientific_interest (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL, name_canonical VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE diploma ADD CONSTRAINT FK_EC218957A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE fos_user ADD CONSTRAINT FK_957A6479EEF8FFC5 FOREIGN KEY (scientific_rank_id) REFERENCES scientific_rank (id)');
        $this->addSql('ALTER TABLE fos_user ADD CONSTRAINT FK_957A6479471E7341 FOREIGN KEY (scientific_degree_id) REFERENCES scientific_degree (id)');
        $this->addSql('ALTER TABLE user_scientific_interest ADD CONSTRAINT FK_D06C3303A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_scientific_interest ADD CONSTRAINT FK_D06C330363156B8C FOREIGN KEY (scientific_interest_id) REFERENCES scientific_interest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publication_user ADD CONSTRAINT FK_866B578438B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publication_user ADD CONSTRAINT FK_866B5784A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3C54C8C93 FOREIGN KEY (type_id) REFERENCES lesson_type (id)');
        $this->addSql('ALTER TABLE discipline ADD CONSTRAINT FK_75BEEE3FA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE topic ADD CONSTRAINT FK_9D40DE1BA5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id)');
        $this->addSql('ALTER TABLE topic ADD CONSTRAINT FK_9D40DE1B80988CEC FOREIGN KEY (parent_topic_id) REFERENCES topic (id)');
        $this->addSql('ALTER TABLE topic_lesson ADD CONSTRAINT FK_5B73472B1F55203D FOREIGN KEY (topic_id) REFERENCES topic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE topic_lesson ADD CONSTRAINT FK_5B73472BCDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3C54C8C93');
        $this->addSql('ALTER TABLE fos_user DROP FOREIGN KEY FK_957A6479EEF8FFC5');
        $this->addSql('ALTER TABLE diploma DROP FOREIGN KEY FK_EC218957A76ED395');
        $this->addSql('ALTER TABLE user_scientific_interest DROP FOREIGN KEY FK_D06C3303A76ED395');
        $this->addSql('ALTER TABLE publication_user DROP FOREIGN KEY FK_866B5784A76ED395');
        $this->addSql('ALTER TABLE discipline DROP FOREIGN KEY FK_75BEEE3FA76ED395');
        $this->addSql('ALTER TABLE publication_user DROP FOREIGN KEY FK_866B578438B217A7');
        $this->addSql('ALTER TABLE topic_lesson DROP FOREIGN KEY FK_5B73472BCDF80196');
        $this->addSql('ALTER TABLE fos_user DROP FOREIGN KEY FK_957A6479471E7341');
        $this->addSql('ALTER TABLE topic DROP FOREIGN KEY FK_9D40DE1BA5522701');
        $this->addSql('ALTER TABLE topic DROP FOREIGN KEY FK_9D40DE1B80988CEC');
        $this->addSql('ALTER TABLE topic_lesson DROP FOREIGN KEY FK_5B73472B1F55203D');
        $this->addSql('ALTER TABLE user_scientific_interest DROP FOREIGN KEY FK_D06C330363156B8C');
        $this->addSql('DROP TABLE diploma');
        $this->addSql('DROP TABLE lesson_type');
        $this->addSql('DROP TABLE scientific_rank');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE user_scientific_interest');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE publication_user');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE scientific_degree');
        $this->addSql('DROP TABLE discipline');
        $this->addSql('DROP TABLE topic');
        $this->addSql('DROP TABLE topic_lesson');
        $this->addSql('DROP TABLE scientific_interest');
    }
}
