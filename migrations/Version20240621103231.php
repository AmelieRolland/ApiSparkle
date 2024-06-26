<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240621103231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, fabric_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_1F1B251E7294869C (article_id), INDEX IDX_1F1B251EAB43EC50 (fabric_id), INDEX IDX_1F1B251EED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EAB43EC50 FOREIGN KEY (fabric_id) REFERENCES fabric (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E7294869C');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EAB43EC50');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EED5CA9E6');
        $this->addSql('DROP TABLE item');
    }
}
