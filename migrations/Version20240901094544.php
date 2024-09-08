<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240901094544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item ADD order_id INT NOT NULL');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E8D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_1F1B251E8D9F6D38 ON item (order_id)');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398126F525E');
        $this->addSql('DROP INDEX IDX_F5299398126F525E ON `order`');
        $this->addSql('ALTER TABLE `order` DROP item_id, CHANGE status_id status_id INT NOT NULL, CHANGE user_id user_id INT NOT NULL, CHANGE price price DOUBLE PRECISION NOT NULL, CHANGE option_delivery option_delivery TINYINT(1) NOT NULL, CHANGE delivery_slot delivery_slot VARCHAR(255) NOT NULL, CHANGE drop_off_date drop_off_date VARCHAR(255) NOT NULL, CHANGE order_date order_date DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E8D9F6D38');
        $this->addSql('DROP INDEX IDX_1F1B251E8D9F6D38 ON item');
        $this->addSql('ALTER TABLE item DROP order_id');
        $this->addSql('ALTER TABLE `order` ADD item_id INT DEFAULT NULL, CHANGE status_id status_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE price price DOUBLE PRECISION DEFAULT NULL, CHANGE option_delivery option_delivery TINYINT(1) DEFAULT NULL, CHANGE delivery_slot delivery_slot VARCHAR(255) DEFAULT NULL, CHANGE drop_off_date drop_off_date VARCHAR(255) DEFAULT NULL, CHANGE order_date order_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('CREATE INDEX IDX_F5299398126F525E ON `order` (item_id)');
    }
}
