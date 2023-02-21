<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230221113855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA72C5E225F');
        $this->addSql('DROP INDEX IDX_3BAE0AA72C5E225F ON event');
        $this->addSql('ALTER TABLE event CHANGE usercreator_id user_creator_id INT NOT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7C645C84A FOREIGN KEY (user_creator_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7C645C84A ON event (user_creator_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7C645C84A');
        $this->addSql('DROP INDEX IDX_3BAE0AA7C645C84A ON event');
        $this->addSql('ALTER TABLE event CHANGE user_creator_id usercreator_id INT NOT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA72C5E225F FOREIGN KEY (usercreator_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA72C5E225F ON event (usercreator_id)');
    }
}
