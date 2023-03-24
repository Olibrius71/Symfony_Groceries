<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324104746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, nom_article VARCHAR(100) NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_type (article_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_3C9CD0287294869C (article_id), INDEX IDX_3C9CD028C54C8C93 (type_id), PRIMARY KEY(article_id, type_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contient (id INT AUTO_INCREMENT NOT NULL, list_of_contient_id INT NOT NULL, article_of_contient_id INT NOT NULL, quantite DOUBLE PRECISION NOT NULL, prix_total DOUBLE PRECISION NOT NULL, achete TINYINT(1) DEFAULT NULL, INDEX IDX_DC302E56DA743AEC (list_of_contient_id), INDEX IDX_DC302E5651911EC (article_of_contient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste (id INT AUTO_INCREMENT NOT NULL, nom_liste VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, nom_type VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_type ADD CONSTRAINT FK_3C9CD0287294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_type ADD CONSTRAINT FK_3C9CD028C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contient ADD CONSTRAINT FK_DC302E56DA743AEC FOREIGN KEY (list_of_contient_id) REFERENCES liste (id)');
        $this->addSql('ALTER TABLE contient ADD CONSTRAINT FK_DC302E5651911EC FOREIGN KEY (article_of_contient_id) REFERENCES article (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_type DROP FOREIGN KEY FK_3C9CD0287294869C');
        $this->addSql('ALTER TABLE article_type DROP FOREIGN KEY FK_3C9CD028C54C8C93');
        $this->addSql('ALTER TABLE contient DROP FOREIGN KEY FK_DC302E56DA743AEC');
        $this->addSql('ALTER TABLE contient DROP FOREIGN KEY FK_DC302E5651911EC');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_type');
        $this->addSql('DROP TABLE contient');
        $this->addSql('DROP TABLE liste');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
