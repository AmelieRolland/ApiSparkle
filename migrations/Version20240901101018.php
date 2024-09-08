<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240901101018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Désactiver les vérifications de clés étrangères pour éviter les erreurs
        $this->addSql('SET FOREIGN_KEY_CHECKS = 0');

        // Ajouter la colonne order_id à la table item
        $this->addSql('ALTER TABLE item ADD order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E8D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_1F1B251E8D9F6D38 ON item (order_id)');

        // Supprimer item_id de la table order et les contraintes associées
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398126F525E');
        $this->addSql('DROP INDEX IDX_F5299398126F525E ON `order`');
        $this->addSql('ALTER TABLE `order` DROP COLUMN item_id');

        // Réactiver les vérifications de clés étrangères
        $this->addSql('SET FOREIGN_KEY_CHECKS = 1');
    }

    public function down(Schema $schema): void
    {
        // Désactiver les vérifications de clés étrangères pour éviter les erreurs
        $this->addSql('SET FOREIGN_KEY_CHECKS = 0');

        // Réajouter item_id à la table order
        $this->addSql('ALTER TABLE `order` ADD item_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('CREATE INDEX IDX_F5299398126F525E ON `order` (item_id)');

        // Réajouter la colonne order_id à la table item si elle a été supprimée
        $this->addSql('ALTER TABLE item DROP COLUMN order_id');

        // Réactiver les vérifications de clés étrangères
        $this->addSql('SET FOREIGN_KEY_CHECKS = 1');
    }
}