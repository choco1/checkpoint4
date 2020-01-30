<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200130101839 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE decoration ADD tye_deco_id INT NOT NULL');
        $this->addSql('ALTER TABLE decoration ADD CONSTRAINT FK_7649DA7B6C51BBB FOREIGN KEY (tye_deco_id) REFERENCES type_deco (id)');
        $this->addSql('CREATE INDEX IDX_7649DA7B6C51BBB ON decoration (tye_deco_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE decoration DROP FOREIGN KEY FK_7649DA7B6C51BBB');
        $this->addSql('DROP INDEX IDX_7649DA7B6C51BBB ON decoration');
        $this->addSql('ALTER TABLE decoration DROP tye_deco_id');
    }
}
