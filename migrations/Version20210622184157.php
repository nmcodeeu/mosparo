<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210622184157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE submission DROP INDEX UNIQ_DB055AF32B4057C1, ADD INDEX IDX_DB055AF32B4057C1 (submit_token_id)');
        $this->addSql('ALTER TABLE submit_token ADD submission_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE submit_token ADD CONSTRAINT FK_6C047AC8E1FD4933 FOREIGN KEY (submission_id) REFERENCES submission (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6C047AC8E1FD4933 ON submit_token (submission_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE submission DROP INDEX IDX_DB055AF32B4057C1, ADD UNIQUE INDEX UNIQ_DB055AF32B4057C1 (submit_token_id)');
        $this->addSql('ALTER TABLE submit_token DROP FOREIGN KEY FK_6C047AC8E1FD4933');
        $this->addSql('DROP INDEX UNIQ_6C047AC8E1FD4933 ON submit_token');
        $this->addSql('ALTER TABLE submit_token DROP submission_id');
    }
}
