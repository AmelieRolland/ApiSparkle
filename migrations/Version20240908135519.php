<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240908135519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item CHANGE order_id order_id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD assigned_employee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398AB391195 FOREIGN KEY (assigned_employee_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F5299398AB391195 ON `order` (assigned_employee_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item CHANGE order_id order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398AB391195');
        $this->addSql('DROP INDEX IDX_F5299398AB391195 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP assigned_employee_id');
    }
}
