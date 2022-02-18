<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220217222729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, qte INT NOT NULL, prix DOUBLE PRECISION NOT NULL, descrp VARCHAR(255) NOT NULL, catego VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
      //  $this->addSql('CREATE TABLE produit_panier (produit_id INT NOT NULL, panier_id INT NOT NULL, INDEX IDX_D39EC6C8F347EFB (produit_id), INDEX IDX_D39EC6C8F77D927C (panier_id), PRIMARY KEY(produit_id, panier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_guide (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, descrp VARCHAR(255) NOT NULL, nb_heure INT NOT NULL, date_creation DATE NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_service_guide (user_id INT NOT NULL, service_guide_id INT NOT NULL, INDEX IDX_8D628782A76ED395 (user_id), INDEX IDX_8D6287822E9B4676 (service_guide_id), PRIMARY KEY(user_id, service_guide_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit_panier ADD CONSTRAINT FK_D39EC6C8F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_panier ADD CONSTRAINT FK_D39EC6C8F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_service_guide ADD CONSTRAINT FK_8D628782A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_service_guide ADD CONSTRAINT FK_8D6287822E9B4676 FOREIGN KEY (service_guide_id) REFERENCES service_guide (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD idjeux_id INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66332EFBBC FOREIGN KEY (idjeux_id) REFERENCES jeux (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66332EFBBC ON article (idjeux_id)');
        $this->addSql('ALTER TABLE matchs ADD id_tournois_id INT NOT NULL');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E60411F409EBB FOREIGN KEY (id_tournois_id) REFERENCES tournois (id)');
        $this->addSql('CREATE INDEX IDX_6B1E60411F409EBB ON matchs (id_tournois_id)');
        $this->addSql('ALTER TABLE tournois ADD iduser_id INT NOT NULL');
        $this->addSql('ALTER TABLE tournois ADD CONSTRAINT FK_D7AAF97786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D7AAF97786A81FB ON tournois (iduser_id)');
        $this->addSql('ALTER TABLE user ADD role_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649D60322AC ON user (role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        
        $this->addSql('DROP TABLE panier');
    
    }
}