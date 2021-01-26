<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210124202121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publication ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779B03A8386 FOREIGN KEY (created_by_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779896DBBDE FOREIGN KEY (updated_by_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_AF3C6779B03A8386 ON publication (created_by_id)');
        $this->addSql('CREATE INDEX IDX_AF3C6779896DBBDE ON publication (updated_by_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779B03A8386');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779896DBBDE');
        $this->addSql('DROP INDEX IDX_AF3C6779B03A8386 ON publication');
        $this->addSql('DROP INDEX IDX_AF3C6779896DBBDE ON publication');
        $this->addSql('ALTER TABLE publication DROP created_by_id, DROP updated_by_id');
    }
}
